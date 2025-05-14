import 'dart:convert';

import 'package:dartz/dartz.dart';
import 'package:dio/dio.dart';
import 'package:internet_connection_checker/internet_connection_checker.dart';
import 'package:room_check/core/Http/dio_req.dart';
import 'package:room_check/core/SharedPref/shared_helper.dart';
import 'package:room_check/core/errors/failurs.dart';
import 'package:room_check/features/Main/data/models/room_model.dart';

class RoomApiProvider {
  static Future<Either<Failure, RoomModel>> getRooms(
      {required DateTime startTime, required DateTime endTime}) async {
    if (await InternetConnectionChecker().hasConnection) {
     try {
        final Response response =
          await Diorequest.getdata(url: '/api/halls', querypram: {
        'cust_code': SharedHelper.getstring(key: 'CUSTOMER'),
        'hall_code': SharedHelper.getstring(key: 'ROOM'),
        'booking_start[to]': endTime,
        'booking_start[from]': startTime
      });
      if (response.statusCode == 200) {
        RoomModel data = roomModelFromJson(json.encode(response.data));
        return Right(data);
      } else {
        return Left(ServerFailure());
      }
     } on DioException {
       return Left(ServerFailure());
     }
    } else {
      return Left(OfflineFailure());
    }
  }
}
