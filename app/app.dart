import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:room_check/core/SharedPref/shared_helper.dart';
import 'package:room_check/features/Login/presentation/pages/login_page.dart';
import 'package:room_check/features/Login/presentation/pages/set_pass_page.dart';
import 'package:room_check/features/Main/presentation/pages/main_page.dart';
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return ScreenUtilInit(
      minTextAdapt: true,
      splitScreenMode: true,
      child: MaterialApp(
          debugShowCheckedModeBanner: false,
          home:  const MainPage()
              ),
    );
  }
}
