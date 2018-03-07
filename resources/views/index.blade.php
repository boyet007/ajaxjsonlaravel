<html>
<head>
    <title>Categories</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1>Categories and subcategories AJAX</h1>
    <div class="col-lg-4">
        {!!  Form::open(array('url' => '', 'files' =>true)) !!}
            <div class="form-group">
                <label for="">Categories</label>
                <select class="form-control input-sm" name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            <label for="">Subcategoeries</label>
            <select class="form-control input-sm" name="subcategory" id="subcategory">
                <option value=""></option>
            </select>
        </div>
        {!! Form::close() !!}
    </div>

</div>



<script>
    $('#category').on('change', function(e){
        console.log(e);

        var cat_id = e.target.value;
        //ajax
        $.get('/ajax-subcat?cat_id=' + cat_id, function(data){
            //success data
            //console.log(data);

            $('#subcategory').empty();
            $.each(data,function(index, subcatObj){
                $('#subcategory').append('<option value="' + subcatObj.id + '">' + subcatObj.name + '</option>');

            });
        });
    });
</script>
<script type="javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>