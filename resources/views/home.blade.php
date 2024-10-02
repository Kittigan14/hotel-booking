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

    <div class="row" ng-app="app" ng-controller="ctrl" id="main">
        {{-- Slide --}}
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
        {{-- End Slide --}}

        {{-- Cards --}}
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
        {{-- End Cards --}}
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
