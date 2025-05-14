import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:room_check/features/Main/presentation/bloc/main_bloc.dart';

class ChangeWeekWidget extends StatelessWidget {
  const ChangeWeekWidget({
    super.key,
    required this.bloc,
  });

  final MainBloc bloc;

  @override
  Widget build(BuildContext context) {
    return Row(
      children: [
        IconButton(
            onPressed: () {
              bloc.add(AddWeekorSubtractWeekEvent(isAdded: false));
            },
            icon: Icon(
              Icons.arrow_back_ios_new,
              size: 24.h,
            )),
        const Spacer(),
        IconButton(
            onPressed: () {
              bloc.add(AddWeekorSubtractWeekEvent(isAdded: true));
            },
            icon: Icon(
              Icons.arrow_forward_ios_sharp,
              size: 24.h,
            )),
      ],
    );
  }
}