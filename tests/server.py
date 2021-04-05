from typing import Optional

from fastapi import FastAPI


app = FastAPI()

# for testing purpose
@app.get("/")
def read_root():
    return {"Hello": "World"}

@app.get("/items/{item_id}")
def read_item(item_id: int, q: Optional[str] = None):
    return {"item_id": item_id, "q": q}

@app.route("/predict",method = "POST")
def predict(): 
    # get audio file and save it
    # invoke keyword spotting service 2stems, 4stems, 5stems 
    # make prediction by invoke CLI args    
    # send back the predicted files
    pass



if __name__ == "__main__":
    app.run(debug=False)