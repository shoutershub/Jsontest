<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JSON TEST</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
</head>
<body>

    <style>

            .er {
                color: red;
                font-weight: 600;
                font-size: 13px;
                margin-top: 20px;
            }
    
    
            
    </style>

    <div class="card">
    <div class="card-header text-center">
        <h1>JSON TEST :-) </h1>
    </div>

    <div class="card-body">
    <form action="{{route('sendData')}}" method="POST">
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
        @csrf
        <div class="col-md-6 offset-md-3">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Product Name *</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    
                    @if($errors->has('name'))
                    <div class="er">
                        {!!  $errors->get('name')[0] !!}
                    </div>
                @endif
                </div>
            </div>
        
            <div class="col-md-12">
                <div class="form-group">
                    <label>Quantiity in Stock *</label>
                    <input type="text" class="form-control" name="qty"  class="form-control" value="{{old('qty')}}">
                    
                    @if($errors->has('qty'))
                        <div class="er">
                            {!!  $errors->get('qty')[0] !!}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Price *</label>
                    <input type="text" class="form-control" name="price"  class="form-control" value="{{old('price')}}">

                    
                    @if($errors->has('price'))
                        <div class="er">
                            {!!  $errors->get('price')[0] !!}
                        </div>
                    @endif

                    </div>
                </div>
            </div>
                <button class="btn btn-lg btn-danger">
                    SAVE
                </button>
                
        </div>
   
    </form>
</div>
    </div>
</body>
</html>