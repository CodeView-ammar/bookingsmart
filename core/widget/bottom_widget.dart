// ignore_for_file: must_be_immutable
import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';

class BottomWidget extends StatelessWidget {
  bool isLoading;
  String name;
  void Function() onTap;
  BottomWidget(
      {super.key,
      required this.isLoading,
      required this.name,
      required this.onTap});

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.symmetric(vertical: 10.h, horizontal: 15.w),
      child: InkWell(
        onTap: !isLoading ? onTap : null,
        child: Container(
          height: 50.h,
          width: double.infinity,
          decoration: BoxDecoration(
              color: !isLoading ? Colors.brown : Colors.grey[500],
              borderRadius: BorderRadius.circular(15)),
          child: Center(
            child: !isLoading
                ? Text(
                    name,
                    style: Theme.of(context)
                        .textTheme
                        .titleLarge!
                        .copyWith(color: Colors.white, fontFamily: 'almarai'),
                  )
                : const CircularProgressIndicator(
                    color: Colors.white,
                  ),
          ),
        ),
      ),
    );
  }
}
