# https://fastapi.tiangolo.com/deployment/docker/

FROM python:3.7
COPY ./app /app
RUN pip install -r /app/requirements.txt
EXPOSE 80
CMD ["uvicorn", "app.main:app", "--host", "0.0.0.0", "--port", "80"]
