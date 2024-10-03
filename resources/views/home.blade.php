@extends('layouts.master')
@section('title', 'Book a room')
@section('content')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">

<style>
    .disabled {
        display: none
    }

</style>


<div class="container">
    <div class="box-content">

        <div class="des">
            <div class="dot-line">
                <p><i class="fa-solid fa-hotel"></i> Lorem ipsum dolor sit amet.</p>
                <h1>Message</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, reprehenderit. Doloremque temporibus
                    nesciunt perspiciatis harum.</p>
                <button>Action</button>
            </div>
        </div>

        <div class="img-cons"></div>

        <div class="info-box hotel">
            <div class="dot-line">
                <h2><i class="fa-solid fa-list"></i> Room Type </h2>

                <ul class="list">
                    <li>
                        <strong>Single Room</strong>
                        <p> - Single Room with a queen-sized bed offers a garden view and a large work desk, perfect for
                            business travelers seeking comfort.</p>
                    </li>
                    <li>
                        <strong>Double Room</strong>
                        <p> - Modern Double Room with a king-sized bed, private bathtub, and a private balcony is
                            perfect for couples seeking a romantic getaway.</p>
                    </li>
                    <li>
                        <strong>Suite</strong>
                        <p> - Luxurious Suite with a spacious living area, kitchenette, and a private balcony with city
                            views offers an unparalleled accommodation experience.</p>
                    </li>
                </ul>
            </div>
        </div>


        <div class="info-box entertainment">
            <div class="dot-line">
                <h2>Amenities</h2>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
        </div>

    </div>

    {{-- <div class="row" ng-app="app" ng-controller="ctrl" id="main">
        <div class="col-md-3" id="slide">
            <h1 style="margin: 0 0 45px 0;">Room type</h1>
            <div class="list-group">
                <a href="#" class="list-group-item" ng-click="getRoomList(null)" ng-class="{'active': roomType == null}"
                    id="room-type-all">All</a>

                <a href="#" class="list-group-item" ng-repeat="t in roomTypes" ng-click="getRoomList(t.id)"
                    ng-class="{'active': roomType == t.id}" style="color: #fff;">@{t.type_name}</a>
            </div>

            <div class="content-bar">
                <h3>Review</h3>
            </div>

        </div>

        <div class="col-md-9">
            <div class="pull-center" style="margin: 0 0 36px 0;">
                <input type="text" class="form-control" ng-model="query" ng-keyup="searchRoom($event)"
                    placeholder="Search . . .">
                <center>
                    <h3 ng-if="!rooms.length" style="margin-top: 50px">No room information found.</h3>
                </center>
            </div>

            <div class="row">
                <div class="col-md-5" ng-repeat="r in rooms">

                    <div class="panel panel-default">
                        <img ng-src="@{r.image}" class="img-responsive">
                        <div class="panel-body d-flex flex-column" style="height: 100%;">
                            <div class="content">
                                <h4 style="text-align: center"><a href="#">@{ r.room_number }</a></h4>
                                <div class="form-group">
                                    <div>
                                        <b>#</b>
                                        <span
                                            ng-class="{'room-available': r.availability_status == 1, 'room-booked': r.availability_status != 1}">
                                            @{r.availability_status == 1 ? 'Vacant room' : 'Already reserved'}
                                        </span>
                                    </div>
                                    <div>price <strong>@{r.price}</strong> THB</div>
                                </div>
                            </div>

                            <div class="btn-action">
                                <a href="#" class="btn btn-success btn-block" ng-click="bookRoom(r)"
                                    ng-disabled="r.availability_status == 0"
                                    ng-class="{'disabled': r.availability_status == 0, 'btn-danger': r.availability_status == 0}">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="#" class="btn btn-success btn-block" id="like" ng-click="addToLike(r)">
                                    <i class="fa-solid fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="main-container" ng-app="app" ng-controller="ctrl">
        <!-- Slide -->
        <div class="sidebar">
            <h1>Room type</h1>
            <div class="list-group">
                <a href="#" class="list-group-item" ng-click="getRoomList(null)" ng-class="{'active': roomType == null}"
                    id="room-type-all">All</a>
                <a href="#" class="list-group-item" ng-repeat="t in roomTypes" ng-click="getRoomList(t.id)"
                    ng-class="{'active': roomType == t.id}">@{t.type_name}</a>
            </div>

            <div class="content-bar">
                <h3>Review</h3>
            </div>
        </div>

        <!-- Cards -->
        <div class="cards-container">
            <div class="search-bar">
                <input type="text" class="form-control" ng-model="query" ng-keyup="searchRoom($event)"
                    placeholder="Search . . ."> 
                <center>
                    <h3 ng-if="!rooms.length" style="margin-top: 50px">No room information found.</h3>
                </center>
            </div>

            <div class="cards">
                <div class="card" ng-repeat="r in rooms">
                    <img ng-src="@{r.image}" class="card-img">
                    <div class="card-body">
                        <div class="dot-line">
                            <h4 class="card-title">@{ r.room_number }</h4>
                            <p class="description">@{ r.description }</p>
                            <p class="card-status">
                                Status:
                                <span ng-class="{'room-available': r.availability_status == 1, 'room-booked': r.availability_status != 1}">
                                    @{r.availability_status == 1 ? 'Vacant room' : 'Already reserved'}
                                </span>
                            </p>
                            <p class="card-price">Price: <strong>@{r.price}</strong> THB</p>
                            <div class="card-actions">
                                <a href="#" class="btn book-btn" ng-click="bookRoom(r)"
                                    ng-disabled="r.availability_status == 0"
                                    ng-class="{'btn-disabled': r.availability_status == 0}">
                                    <i class="fa fa-shopping-cart"></i> Book
                                </a>
                                <a href="#" class="btn like-btn" id="like" ng-click="addToLike(r)">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>


<script type="text/javascript">
    var app = angular.module('app', []).config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('@{').endSymbol('}');
    });

    app.service('roomService', function ($http) {
        this.getRoomList = function (room_type_id = null) {
            if (room_type_id) return $http.get('/api/room/' + room_type_id);
            return $http.get('/api/room');
        };

        this.getRoomTypeList = function () {
            return $http.get('/api/room_type');
        };

        this.searchRoom = function (query) {
            return $http.post('/api/room/search', {
                query: query
            });
        };
    });

    app.controller('ctrl', function ($scope, roomService) {
        $scope.rooms = [];
        $scope.roomTypes = [];
        $scope.roomType = null;

        $scope.getRoomList = function (room_type_id = null) {
            $scope.roomType = room_type_id;
            roomService.getRoomList(room_type_id).then(function (res) {
                if (!res.data.ok) return;
                $scope.rooms = res.data.rooms;
            });
        };

        $scope.getRoomTypeList = function () {
            roomService.getRoomTypeList().then(function (res) {
                if (!res.data.ok) return;
                $scope.roomTypes = res.data.roomTypes;
            });
        };

        $scope.searchRoom = function (e) {
            if (!$scope.query || $scope.query.trim() === "") {
                $scope.getRoomList();
                return;
            }

            roomService.searchRoom($scope.query).then(function (res) {
                if (!res.data.ok) return;
                $scope.rooms = res.data.rooms;
            });
        };

        $scope.addToLike = function (r) {
            window.location.href = '/like/add/' + r.id;
        };

        $scope.bookRoom = function (room) {
            if (room.availability_status == 1) {
                window.location.href = '/bookings/create/' + room.id;
            }
        };

        $scope.getRoomList();
        $scope.getRoomTypeList();
    });

</script>

@endsection
