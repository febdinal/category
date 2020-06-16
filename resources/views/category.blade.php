<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Product</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('js/app.js') }}"> 
    </head>
    <body>     
        <div class="name container">
            <h2> Silahkan Isi </h2>
        <form action="{{ route(' ') }}" method="POST"> 
            {{ csrf_field() }}
            <div class="form-group" >
                <lable for="nama"> Title Product : </lable>
                <input type="text" class="form-control" id="" placeholder="Enter Product" name="nama_toko">
            </div>
            <div class="form-group" >
                <lable for=" "> Brands : </lable>
                <select id="cars" name="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                  </select>
                  <input type="submit">
            </div>
            <div class="form-group" >
                <lable for=" "> Gender : </lable>
                <select id="cars" name="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                </select>
                <input type="submit">
            </div>
            <div class="form-group" >
                <lable for=" "> Category : </lable>
                <select id="cars" name="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                </select>
                <input type="submit">
            </div>
            <textarea name="message" rows="10" cols="30"> Masukan deskripsi </textarea>
  <input type="submit">
        <input type="submit" class="btn btn-primary">
        </div>
        
    </body>
</html>