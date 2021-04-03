import requests

from spleeter.separator import Separator

response = requests.get('http://127.0.0.1:8000/audio/.%2Faudio%2Faudio_example.mp3')
result = response.json()
print(result['file_path'])

if __name__ == '__main__':
    separator = Separator("spleeter:2stems")
    separator.separate_to_file(result['file_path'], "/sep_output")