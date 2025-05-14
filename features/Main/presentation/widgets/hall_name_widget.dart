
import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:room_check/core/resources/extentions.dart';

class HallNameWidget extends StatelessWidget {
  final String text;
  const HallNameWidget({super.key, required this.text});

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      height: 60.h,
      width: double.infinity,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Expanded(
              child: Text(
            text,
            style: TextStyle(
                fontFamily: 'almarai',
                fontSize: context.height > 450 ? 17.sp : 8.sp,
                fontWeight: FontWeight.w500),
          ))
        ],
      ),
    );
  }
}