import logging
import aioredis

from fastapi import FastAPI, Request
from fastapi.responses import HTMLResponse
from fastapi.staticfiles import StaticFiles
from fastapi.templating import Jinja2Templates
from pydantic import BaseSettings, BaseModel
from aioredis.exceptions import ResponseError
from pathlib import Path

BASE_DIR = Path(__file__).resolve().parent

class Config(BaseSettings):
    # The default URL expects the app to run using Docker and docker-compose.
    redis_url: str = 'redis://redis:6379'
    #redis_url: str = 'redis://localhost:6379'
    
class Todo(BaseModel):
    todo: str = None

log = logging.getLogger(__name__)
config = Config()
redis = aioredis.from_url(config.redis_url, decode_responses=True)
app = FastAPI()
app.mount("/static", StaticFiles(directory=str(Path(BASE_DIR, "static"))), name="static")
templates = Jinja2Templates(directory=str(Path(BASE_DIR, 'templates')))

@app.get("/", response_class=HTMLResponse)
async def read_item(request: Request):
    return templates.TemplateResponse("todos.html", {"request": request})

@app.post("/addTodo", response_class=HTMLResponse)
async def read_item(todo: Todo, request: Request):
    todo_list = []
    response = ""
    if todo.todo != "first_todo" :
        await redis.execute_command("LPUSH", "todoList", todo.todo)
        todo_list = await redis.execute_command("LRANGE" , "todoList", "0", "10")
        response = templates.TemplateResponse("todo_rows.html", {"todo_list": todo_list, "request": request})
    return response
