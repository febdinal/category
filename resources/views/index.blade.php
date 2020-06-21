<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <table border="5">    
                    <div class="name container">
                        <h2> Product </h2>
                        <b> New Product </b>
                        <form id="productForm">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                            <div class="form-group" >
                                <lable for="nama"> Title Product : </lable>
                                <input type="text" class="form-control" id="" placeholder="Enter Product" name="title_product">
                            </div>
                            <div class="form-group" >
                                <lable for=" "> Brands : </lable>
                                <select id="brands" name="brands" placeolder="--Select Brands--">
                                    <option value="eiger">Eiger</option>
                                    <option value="lv">LV</option>
                                    <option value="supreme">Supreme</option>
                                    <option value="gucci">GUCCI</option>
                                </select>
                            </div>
                            <div class="form-group" >
                                <lable for=" "> Gender : </lable>
                                <select id="gender" name="gender" placeholder="--Select Gender--">
                                    <option value="wanita">Wanita</option>
                                    <option value="pria">Pria</option>
                                </select>
                            </div>
                            <div class="form-group" >
                                <lable for=" "> Category : </lable>
                                <select onchange="ambilsubcategory()" id="category" name="category">
                                </select>
                            </div>
                            <div class="form-group" >
                                <lable for=" "> SubCategory : </lable>
                                <select id="subcategory" name="subcategory" >
                                </select>
                            </div>
                            <div>
                                <textarea id="keterangan" name="keterangan" rows="10" cols="30" 
                                    placeholder="Enter Description"></textarea>
                                <input id="submitButton" type="button" class="btn btn-primary" value="Kirim"/>
                            </div>
                        </form>
                    </div>
                </table>
            </div>
            <div class="col-8">
                <table class="table table-bordered" id="tabelBE">
                    <thead>
                        <style>
                            .dataTable > thead > tr > th[class*="sort"]:before,
                            .dataTable > thead > tr > th[class*="sort"]:after {
                                content: "" !important;
                            }
                       </style>
                        <td colspan="8"><center><h3> List Product</h3></td>
                        <tr>
                            <th>Id</th>
                            <th>Title Product</th>
                            <th>Brand</th>
                            <th>Gender</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                            
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

        <script type="text/javascript">

            function info(title){
                var n = title.toString();
                    alert(n);   
            }

            function ambilsubcategory()
            {
                console.log('ok');
                $('#subcategory').empty()
                var dropDown = document.getElementById("category");
                var id_category = dropDown.options[dropDown.selectedIndex].value;
                $.ajax({
                        type: "get",
                        url: "/produk/subcategory/"+ id_category,
                        data: { 'id_category': id_category  },
                        success: function(data){
                            // Parse the returned json data
                            var opts=$.parseJSON(data);
                            // Use jQuery's each to iterate over the opts value
                            $.each(opts, function(i, d) {
                                // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                                $('#subcategory').append('<option value="'+d.id_subcategory+'">'+d.name +'</option>');
                            });
                        }
                    }); 
            }

            function hapus(id) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
                    url: "/produk/hapus/{id}",
                    method:"post",
                    data:{"id":id, "_token":"{{ csrf_token() }}"},
                    success: function(data)
                    {
                        $('#tabelBE').DataTable().ajax.reload();
                    }
                })
            }
            
            $(function() {
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

                $('#category').empty()
                $.ajax({
                        type: "get",
                        url: "/produk/category",
                        success: function(data){
                            // Parse the returned json data
                            var opts = $.parseJSON(data);
                            // Use jQuery's each to iterate over the opts value
                            $.each(opts, function(i, d) {
                                // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                                $('#category').append('<option value="'+d.id_category+'">'+d.name+'</option>');
                            });
                        }
                    });

                $('#category').change(function(){
                    var conceptVal = $("#category option:selected").val();
                    $(this).children("option:selected").val();
                        alert(conceptVal);

                    });
            });

            $('#submitButton').click( function() {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/produk/new',
                    type: 'post',
                    dataType: 'json',
                    data: $('#productForm').serialize(),
                    success: function(data) {
                        $('#tabelBE').DataTable().ajax.reload();
                    }
                });
            });     
            
            
        </script>   
    </body>
</html>