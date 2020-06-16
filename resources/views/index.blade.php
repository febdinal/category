<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Product</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('js/app.js') }}"> 
    
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Overlay Scroll Bars -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">


        <!-- SELECT2 -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        <!-- SELECT2 -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

    </head>
    <body class="container">
        <div class="row mt-4">
            <div class="col-4 card bg-white container py-4">
                <table border="5" >    
                    <div class="name container">
                        <h2> Product </h2>
                        <b> New Product </b>
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
                    </div>
                    <div class="form-group" >
                        <lable for=" "> Gender : </lable>
                        <select id="cars" name="cars">
                            <option value="wanita">Wanita</option>
                            <option value="pria">Pria</option>
                        </select>
                    </div>
                    <div class="form-group" >
                        <lable for=" "> Category : </lable>
                        <select id="cars" name="cars">
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </select>
                    </div>
                    <textarea name="message" rows="10" cols="30" placeholder="Enter Description"></textarea>
                    <input type="submit" class="btn btn-primary">
                    </div>
                </table>
            </div>
            <div class="col-8">
                <table class="table table-bordered" id="tabelBE">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title Product</th>
                            <th>Brand</th>
                            <th>Gender</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
        <!-- Sweet Alert -->
        <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

        <script>
            $(function() {
                // Console.log('ok');
                $('#tabelBE').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/produk/ajax',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'title_product', name: 'title_product' },
                        { data: 'brands', name: 'brands' },
                        { data: 'gender', name: 'gender' },
                        { data: 'category', name: 'category' },
                        { data: 'subcategory', name: 'subcategory' },
                        { data: 'keterangan', name: 'keterangan' },
                        { data: 'action' , name: 'action' ,orderable:false , searchable:false}
                    ]
                });
            });
        </script>

    </body>
</html>