import sys
from GPT import GPT

if __name__ == '__main__':
    try:
        gpt = GPT(message=sys.argv[1])

        if gpt.ready:
            print(gpt.content())
    except Exception as e:
        print(e)
