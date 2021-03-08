@extends('master')
@section('content')



<div class="container mt-5" style="width:30%;">
    <div class="jumbotron">
        <h2>Log In</h2>
        
        <hr>
            <div class="form-group">
                <label for="emailusername">Username or Email:</label>
                <input type="text" name="emailusername" class="form-control" value="admin" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" value="1234" required>
            </div>
            <!--For showing error for wrong input  -->
            <p id="wrong_id" style=" color:red; font-size:12px; "></p>


            <button type="submit" name="submit" value="Login" onclick="window.location.href='/adminPage'" class="btn btn-lg btn-orange btn-block">Submit</button>
            
            <br>
            <p style="text-align: center; font-size: 14px;"><a href="/home">Back To Home</a></p>
    </div>
</div>



@endsection