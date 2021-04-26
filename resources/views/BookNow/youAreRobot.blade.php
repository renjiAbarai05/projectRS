@extends('BookNow.bookNowMaster')
@section('content')
<style>
    .save-button {
    background-color: #4cbb17;
    border: none;
    color: white;
    padding: 9px;
    font-size: 16px;
    cursor: pointer;
    width: 120px;
    font-weight: 500;
    letter-spacing: 0.5px;
    border-radius: 3px;
    }
    .save-button:hover{
        background-color: #00a86b;
    }
    .delete-button{
    background-color: #b80f0a;
    border: none;
    color: white;
    padding: 9px;
    font-size: 16px;
    cursor: pointer;
    width: 120px;
    font-weight: 500;
    letter-spacing: 0.5px;
    border-radius: 3px;
    float: right !important;
}
.delete-button:hover{
    background-color: red;
}
    
    .DivHeaderText{
        font-weight: 500;
        color: #676767;
    }

</style>


<script>
    Swal.fire({
        title: 'Booking Failed. Failure to Check Captcha.',
        allowOutsideClick: false,
        confirmButtonText: `Ok`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
        window.location="/";
        } 
    });
</script>

@endsection