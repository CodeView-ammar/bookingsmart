
import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:room_check/core/resources/extentions.dart';

class ErrorMessageWidget extends StatelessWidget {
  const ErrorMessageWidget({
    super.key,
  });

  @override
  Widget build(BuildContext context) {
    return Center(
        child: Column(
          children: [
            Text(
              'لا يوجد بيانات',
              style: TextStyle(
                  fontFamily: 'almarai',
                  fontSize:context.height > 450 ? 17.sp : 8.sp,
                  fontWeight: FontWeight.w500),
            ),
            Text(
              'تحقق من التاريخ او كود المستخدم او القاعه',
              style: TextStyle(
                  fontFamily: 'almarai',
                  fontSize: context.height > 450 ? 17.sp : 8.sp,
                  fontWeight: FontWeight.w500),
            ),
          ],
        ),
      );
  }
}
