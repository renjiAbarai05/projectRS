
<?php $__env->startSection('content'); ?>



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


            <button type="submit" name="submit" value="Login" onclick="window.location.href='/dashboard'" class="btn btn-lg btn-primary btn-block">Submit</button>
            
            <br>
            <p style="text-align: center; font-size: 14px;"><a href="/home">Back To Home</a></p>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ReservationSystem\resources\views/loginUser.blade.php ENDPATH**/ ?>