import os
import errno
import i2cpy

FIFO = 'i2cpipe'

try:
    os.mkfifo(FIFO)
except OSError as oe: 
    if oe.errno != errno.EEXIST:
        raise

print("Opening FIFO...")
with open(FIFO) as fifo:
    print("FIFO opened")
    while True:
        data = fifo.read()
        if len(data) == 0:
            continue
        else:
            print('Read: "{0}"'.format(data))
            os.system("python3 /var/www/html/i2cpy.py "+format(data))
