@extends('master')
@section('content')

<style>
.carousel-height{
    height: 100%;
}
</style>

<div id="home"></div>
<div id="carouselExampleControls" style="margin-top: -100px;" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active view">
        <div class="carousel-caption animated fadeIn delay-1s">
            <h1>Spend Quality Holidays With Us</h1>
            <h3>together with your love ones</h3>
            <button class="btn btn-outline-light float-left mt-4 border-radius">Get Started</button>
        </div>
        <img class="d-block w-100 carousel-height" src="images/home_gallary/1.jpg" alt="First slide">
        <div class="mask rgba-black-strong"></div>
        </div>
        <div class="carousel-item view">
        <img class="d-block w-100 carousel-height" src="images/home_gallary/2.jpg"
            alt="Second slide">
            <div class="carousel-caption animated fadeIn delay-1s">
                <div class="carou-subheader">AFFORDABLE HOTEL ACCOMODATIONS IN TACLOBAN CITY</div>
                <div class="carou-header">A PERFECT PLACE TO RELAX</div>
            </div>
            <div class="mask rgba-black-strong"></div>
        </div>
        <div class="carousel-item view">
        <img class="d-block w-100 carousel-height" src="images/home_gallary/3.jpg"
            alt="Third slide">
            <div class="mask rgba-black-strong"></div>
            <div class="carousel-caption animated fadeIn delay-1s">
            <h1>The Perfect Place<br> For Getaways!</h1>
            <h3>designed for relaxation</h3>
        </div>
        </div>
        <div class="carousel-item view">
        <img class="d-block w-100 carousel-height" src="images/home_gallary/4.jpg"
            alt="Forth slide">
            <div class="mask rgba-black-strong"></div>
        </div>
        <div class="carousel-item view">
        <img class="d-block w-100 carousel-height" src="images/home_gallary/5.jpg"
            alt="Third slide">
            <div class="mask rgba-black-strong"></div>
        </div> 
        <div class="carousel-item view">
        <img class="d-block w-100 carousel-height" src="images/home_gallary/6.jpg"
            alt="Third slide">
            <div class="mask rgba-black-strong"></div>
        </div>
        <div class="carousel-item view">
        <img class="d-block w-100 carousel-height" src="images/home_gallary/7.jpg"
            alt="Third slide">
            <div class="mask rgba-black-strong"></div>
            <div class="carousel-caption animated fadeIn delay-1s">
            <div class="carou-subheader">A SHORT DISTANCE GOING TO THE FAMOUS STO NIÑO CHURCH </div>
            <div class="carou-header">PLAN YOUR PERFECT TRIP</div>
            </div>
        </div>
        <div class="carousel-item view">
        <img class="d-block w-100 carousel-height" src="images/home_gallary/8.jpg"
            alt="Third slide">
            <div class="mask rgba-black-strong"></div>
        </div>
        <div class="carousel-item view">
        <img class="d-block w-100 carousel-height" src="images/home_gallary/9.jpg"
            alt="Third slide">
            <div class="mask rgba-black-strong"></div>
        </div>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div id="roomFeature" class="mt-3"></div>
    <div class="container-fluid text-center text-md-left paddings">
        <div class="row mt-3">
            <div class="col-md-2 offset-md-2">
                <img class="d-block w-100 img-feature" src="images/feature/DELUXE.jpg">
                <span class="label font-weight-bold mt-1">Deluxe Room</span>
                <p class="data text-justify mt-1">A comfortable and affordable airconditioned room with 1 King size bed</p>
            </div>
            <div class="col-md-2">
                <img class="d-block w-100 img-feature" src="images/feature/FAMILY.jpg">
                <span class="label font-weight-bold mt-1">Family Room</span>
                <p class="data text-justify mt-1">A very spacious room designed for adults and their children. Good for 4 to 6 person.</p>
            </div>
            <div class="col-md-2">
                <img class="d-block w-100 img-feature" src="images/feature/TWIN.jpg">
                <span class="label font-weight-bold mt-1">Twin Room</span>
                <p class="data text-justify mt-1">Hotel Lai Rico can accomodate 2 to 4 people in adjacent twin beds.</p>
            </div>
            <div class="col-md-2">
                <img class="d-block w-100 img-feature" src="images/feature/SINGLE.jpg">
                <span class="label font-weight-bold mt-1">Single Room</span>
                <p class="data text-justify mt-1">Our comfortable single rooms are just the right size if you are travelling alone.</p>
            </div>
        </div>
    </div>
<div id="aboutUs" class="mt-3"></div>
<div class="parallax">
    <div class="container">
        <div class="info wow fadeInLeft" style="visibility: visible;">
            <div class="row">
                <div class="col-lg-12 adjuster">
                    <p class="info-head" id="info-head-size"><span class="info-label-background">HOTEL LAI RICO</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <p class="info-caption">The Hotel Lai Rico was established on April 2009 located at Tacloban City downtown area a short distance from the Sto. Nino Church,and popular "Mags" midnight barbeque. It is only 8 km from the airport. The hotel has a parking area. In Hotel Lai Rico you will be welcomed by a peaceful place to relax. The hotel is a four (4) storey building with fifty (50) different types of rooms which includes a single, deluxe, twin and family room. </p>
                    <button type="button" class="btn goto-button font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg">Read More</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection