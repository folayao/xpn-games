<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <form id="ajaxform">

        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Name" required="">
        </div>

        <div class="form-group">
            <label>price:</label>
            <input type="text" name="price" class="form-control" placeholder="Enter Email" required="">
        </div>

        <div class="form-group">
            <strong>category:</strong>
            <input type="text" name="category" class="form-control" placeholder="Enter Mobile" required="">
        </div>
        <div class="form-group">
            <strong>designer:</strong>
            <input type="text" name="designer" class="form-control" placeholder="Enter Your Message" required="">
        </div>
        <div class="form-group">
            <strong>pg:</strong>
            <input type="text" name="pg" class="form-control" placeholder="Enter Your Message" required="">
        </div>
        <div class="form-group">
            <strong>details:</strong>
            <input type="text" name="details" class="form-control" placeholder="Enter Your Message" required="">
        </div>
        <div class="form-group">
            <strong>keyword:</strong>
            <input type="text" name="keyword" class="form-control" placeholder="Enter Your Message" required="">
        </div>
        <div class="form-group">
        
            <button class="btn btn-success save-data" >Save</button>
        </div>
    </form>
    <script type="text/javascript">

    $(".save-data").click(function(event){
      event.preventDefault();

      var title = $("input[name=title]").val();
      var price = $("input[name=price]").val();
      var category = $("input[name=category]").val();
      var designer = $("input[name=designer]").val();
      var pg = $("input[name=pg]").val();
      var details = $("input[name=details]").val();
      var keyword = $("input[name=keyword]").val();
      let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "http://127.0.0.1:8000/api/videogame/save",
        type:"POST",
        data:{
            title:title,
            price:price,
            category:category,
            designer:designer,
            pg: pg,
            details: details,
            keyword: keyword,
            _token: _token
        },
        success:function(data){
            window.location.href = 'http://127.0.0.1:8000/api/videogame/save';
        },
       });
  });
      </script>
      
</body>
</html>