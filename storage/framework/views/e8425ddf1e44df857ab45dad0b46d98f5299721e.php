<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Admin Product</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('js/app.js')); ?>"> 
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>">
        <!-- Overlay Scroll Bars -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
        <!-- SELECT2 -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
        <!-- SELECT2 -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')); ?>">

    </head>
    <body class="container">
        <div class="row mt-4">
            <div class="col-4 card bg-white container py-4">
                <table border="5" >    
                    <div class="name container">
                        <h2> Product </h2>
                        <b> New Product </b>
                        <form id="productForm">
                            <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">

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
                                <select id="category" name="category">
                                    <option value="pakaian">Pakaian</option>
                                    <option value="art">ART</option>
                                    <option value="akasesoris">Aksesoris</option>
                                </select>
                            </div>
                            <div class="form-group" >
                                <lable for=" "> SubCategory : </lable>
                                <select id="subcategory" name="subcategory">
                                    <option value="tas">Tas</option>
                                    <option value="kaos">Kaos</option>
                                    <option value="hoodie">Hoodie</option>
                                    <option value="stiker">stiker</option>
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
                        <td colspan="8" ><center><h3> List Product</h3></td>
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
        <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')); ?>"></script>
        <!-- Sweet Alert -->
        <script src="<?php echo e(asset('assets/plugins/select2/js/select2.full.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>

        <script type="text/javascript">
            function hapus(id) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
                    url: "/produk/hapus/{id}",
                    method:"post",
                    data:{"id":id, "_token":"<?php echo e(csrf_token()); ?>"},
                    success: function(data)
                    {
                        alert('berhasil gan');
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
            });

            // $('#submitButton').click( function() {
            //     $.post( '/produk/newproduk', $('#tabelBE').serialize(), function(data) {
            //             // ... do something with response from server
            //     },
            //             'json' // I expect a JSON response
            //           );
            // });

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

            // $(document).on('click', '.delete',function(){
            //     var id = $(this).attr("id");
            //    if(confirm("wish to delete?"))
            //    { 
            //         $.ajax({
            //                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
            //                 url: "/produk/hapus/{id}",
            //                 method:"post",
            //                 data:{"id":id, "_token":"<?php echo e(csrf_token()); ?>"},
            //                 success: function(data)
            //                 {
            //                     $('#message').html(data);
            //                 }
            //         })
            //     }
            // });     

        </script>   
    </body>
</html><?php /**PATH E:\Laravel\category\resources\views/index.blade.php ENDPATH**/ ?>