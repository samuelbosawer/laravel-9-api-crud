## Learning Laravel CURD with API
Sumber belajar 

**[Tutorial crud rest api laravel 8 mudah dipahami](https://www.youtube.com/watch?v=y_HuQ7NMlTw)**
**[Laravel 8 tutorial - Upload file with API](https://youtu.be/k7aXBY0HPCEhttps)**

## Dokumentasi cara menggunakan 
### Create
Method post
- *Request*
    ```
    http://127.0.0.1:8000/api/weekend/update/name={name}&job={job}&topic={topic}&date={date}&jam_mulai={jam_mulai}jam_selesai={jam_selesai}
    ```

    - *Response*
    ```json

    ```

    - *Request*
      ```php
                'name' => $request->name,
                'job' =>  $request->job,
                'topic' => $request->topic,
                'date' => $request->date,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'picture' => $imgname,
    
    ```
### Update
### Read
### Delete