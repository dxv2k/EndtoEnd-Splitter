import requests 
URL = "http://127.0.0.1:8000/predict"
TEST_AUDIO_FILE_PATH = "audio\audio_example.mp3" 

if __name__ == '__main__':
    # open audio file with "rb" mode (reading mode in binary) 

    # send with POST request 
    # This is just an example to wrap around what need to do
    values = {"file":(TEST_AUDIO_FILE_PATH, "audio/mp3")}
    response = requests.post(URL, files = values)
    data = response.json() # client should receive download links 
                          # for vocal and instruments (2stems model) 
    pass 

