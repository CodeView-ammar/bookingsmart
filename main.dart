import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:room_check/app/app.dart';
import 'package:room_check/core/Http/dio_req.dart';
import 'package:room_check/core/SharedPref/shared_helper.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await ScreenUtil.ensureScreenSize();
  await SharedHelper.initshared();
  await Diorequest.initdio();
  runApp(const MyApp());
}
