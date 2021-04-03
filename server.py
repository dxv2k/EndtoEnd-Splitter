from fastapi import FastAPI 
from typing import Optional
app = FastAPI()

@app.get("/") 
async def root(): 
    return {"message": "Hello World"}

@app.get("/audio/{file_path:path}")
async def read_file(file_path: str):
    return {"file_path": file_path}
