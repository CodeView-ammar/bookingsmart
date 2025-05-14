
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';

import 'app_colors.dart';

ThemeData appTheme() {
  return ThemeData(
      scaffoldBackgroundColor: AppColors.scaffoldColor,
      appBarTheme: AppBarTheme(
        systemOverlayStyle: SystemUiOverlayStyle(
          statusBarColor: AppColors.primaryColor
        ),
        titleTextStyle: const TextStyle(
          fontSize: 20,
          fontWeight: FontWeight.bold,
          fontFamily: 'almarai'
        ),
          elevation: 0,
          backgroundColor: AppColors.primaryColor),
      

      bottomNavigationBarTheme: const BottomNavigationBarThemeData(
        showUnselectedLabels: true
      )
          );
    
    
}
