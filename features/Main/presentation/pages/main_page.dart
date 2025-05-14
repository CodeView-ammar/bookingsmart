import 'package:flutter/material.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:room_check/core/resources/extentions.dart';
import 'package:room_check/core/widget/loading_widget.dart';
import 'package:room_check/features/Main/presentation/bloc/main_bloc.dart';
import 'package:room_check/features/Main/presentation/widgets/change_week_widget.dart';
import 'package:room_check/features/Main/presentation/widgets/detailes_item_widget.dart';
import 'package:room_check/features/Main/presentation/widgets/error_message_widget.dart';

import '../widgets/hall_name_widget.dart';

class MainPage extends StatelessWidget {
  const MainPage({super.key});

  @override
  Widget build(BuildContext context) {
    return BlocProvider(
      create: (context) => MainBloc()..add(GetRoomsEvent()),
      child: BlocConsumer<MainBloc, MainState>(
        listener: (context, state) {},
        builder: (context, state) {
          var bloc = context.read<MainBloc>();
          return Scaffold(
            backgroundColor: Colors.grey[100],
            body: SafeArea(
                child: Center(
              child: Column(
                children: [
                  Expanded(
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        if (state is LoadingRoomsState)
                          const LoadingGeneralWidget(),
                        if (state is SuccessRoomsState)
                          Expanded(
                            child: Column(
                              children: [
                                ChangeWeekWidget(bloc: bloc),
                                5.heightBox,
                                HallNameWidget(
                                  text: state.data.data.first.hallTitle,
                                ),
                                5.heightBox,
                                state.data.data.isNotEmpty
                                    ? Expanded(
                                      child: SingleChildScrollView(
                                        child: SizedBox(
                                          height: context.height,
                                          width: context.width,
                                          child: ListView.builder(
                                          shrinkWrap: true,
                                          physics:
                                              const NeverScrollableScrollPhysics(),
                                          scrollDirection: Axis.horizontal,
                                          itemCount: state.data.data.first
                                              .prepareHallDays.length,
                                          itemBuilder: (context, index) {
                                            return BookingWidget(
                                              dates: bloc.data,
                                              data: state.data,
                                              index: index,
                                            );
                                          },
                                                                                  ),
                                        ),
                                      ),
                                    )
                                    : const ErrorMessageWidget(),
                              ],
                            ),
                          ),
                        if (state is ErrorRoomsState)
                          Center(
                            child: Column(
                              children: [
                                Text(
                                  state.message,
                                  style: TextStyle(
                                      fontFamily: 'almarai',
                                      fontSize: context.height * 0.02,
                                      fontWeight: FontWeight.w500),
                                ),
                                5.heightBox,
                                ElevatedButton(
                                    onPressed: () {
                                      bloc.add(GetRoomsEvent());
                                    },
                                    child: Text(
                                      'اعاده المحاوله',
                                      style: TextStyle(
                                        fontFamily: 'almarai',
                                        fontSize:
                                            context.height > 450 ? 16.sp : 8.sp,
                                      ),
                                    ))
                              ],
                            ),
                          ),
                      ],
                    ),
                  )
                ],
              ),
            )),
          );
        },
      ),
    );
  }
}
