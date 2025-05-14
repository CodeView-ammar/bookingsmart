import 'package:flutter/material.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:room_check/core/DateTime/date_time_helper.dart';
import 'package:room_check/core/resources/extentions.dart';
import 'package:room_check/features/Main/data/models/room_model.dart';

class BookingWidget extends StatelessWidget {
  final RoomModel data;
  final int index;
  final List<DateTime> dates;
  const BookingWidget({
    super.key,
    required this.data,
    required this.dates,
    required this.index,
  });

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        SizedBox(
          width: context.width / 7,
          child: Column(children: [
            Text(
              DateTimeHelper.getMonth(dates[index].month.toString()),
              style: TextStyle(
                  fontFamily: 'almarai',
                  fontSize: context.height > 450 ? 17.sp : 8.sp,
                  fontWeight: FontWeight.bold),
            ),
            5.heightBox,
            Text(
              dates[index].day.toString(),
              style: TextStyle(
                  fontFamily: 'almarai',
                  fontSize: context.height > 450 ? 17.sp : 8.sp,
                  fontWeight: FontWeight.bold),
            ),
            5.heightBox,
            Text(
              data.data.first.prepareHallDays[index].dayName,
              style: TextStyle(
                  fontFamily: 'almarai',
                  fontSize: context.height > 450 ? 17.sp : 8.sp,
                  fontWeight: FontWeight.bold,
                  color: Colors.blue),
            ),
            5.heightBox,
            SizedBox(
              width: 100.w,
              child: ListView.builder(
                shrinkWrap: true,
                physics: const NeverScrollableScrollPhysics(),
                itemCount:
                    data.data.first.prepareHallDays[index].bookings.length,
                itemBuilder: (context, index1) {
                  return Padding(
                    padding: EdgeInsets.symmetric(vertical: 5.h),
                    child: Column(
                      children: [
                        Container(
                          height: 30.h,
                          decoration: BoxDecoration(
                              color: Colors.red,
                              borderRadius: BorderRadius.circular(5.h),
                              border: Border.all(color: Colors.grey)),
                          child: Center(
                            child: Text(
                              data.data.first.prepareHallDays[index]
                                  .bookings[index1].bookingHourStart,
                              style: TextStyle(
                                  fontFamily: 'almarai',
                                  fontSize:
                                      context.height > 450 ? 16.sp : 8.sp,
                                  fontWeight: FontWeight.w600),
                            ),
                          ),
                        ),
                        Icon(
                          Icons.arrow_drop_down_outlined,
                          size: 20.h,
                        ),
                        Container(
                          height: 30.h,
                          decoration: BoxDecoration(
                              color: Colors.red,
                              borderRadius: BorderRadius.circular(5.h),
                              border: Border.all(color: Colors.grey)),
                          child: Center(
                            child: Text(
                              data.data.first.prepareHallDays[index]
                                  .bookings[index1].bookingHourEnd,
                              style: TextStyle(
                                  fontFamily: 'almarai',
                                  fontSize:
                                      context.height > 450 ? 16.sp : 8.sp,
                                  fontWeight: FontWeight.w600),
                            ),
                          ),
                        ),
                      ],
                    ),
                  );
                },
              ),
            ),
            SizedBox(
              width: 100.w,
              child: ListView.builder(
                shrinkWrap: true,
                physics: const NeverScrollableScrollPhysics(),
                itemCount: data
                    .data.first.prepareHallDays[index].availableDay.length,
                itemBuilder: (context, index2) {
                  return Padding(
                    padding: EdgeInsets.symmetric(vertical: 5.h),
                    child: Column(
                      children: [
                        Container(
                          height: 30.h,
                          decoration: BoxDecoration(
                              color: Colors.green,
                              borderRadius: BorderRadius.circular(5.h),
                              border: Border.all(color: Colors.grey)),
                          child: Center(
                            child: Text(
                              DateTimeHelper.getHoursByAmBm(DateTime.parse(
                                  '2024-02-05 ${data.data.first.prepareHallDays[index].availableDay[index2].sysFromHour}')),
                              style: TextStyle(
                                  fontFamily: 'almarai',
                                  fontSize:
                                      context.height > 450 ? 16.sp : 8.sp,
                                  fontWeight: FontWeight.w600),
                            ),
                          ),
                        ),
                        Icon(
                          Icons.arrow_drop_down_outlined,
                          size: 20.h,
                        ),
                        Container(
                          height: 30.h,
                          decoration: BoxDecoration(
                              color: Colors.green,
                              borderRadius: BorderRadius.circular(5.h),
                              border: Border.all(color: Colors.grey)),
                          child: Center(
                            child: Text(
                              DateTimeHelper.getHoursByAmBm(DateTime.parse(
                                  '2024-02-05 ${data.data.first.prepareHallDays[index].availableDay[index2].sysToHour}')),
                              style: TextStyle(
                                  fontFamily: 'almarai',
                                  fontSize:
                                      context.height > 450 ? 16.sp : 8.sp,
                                  fontWeight: FontWeight.w600),
                            ),
                          ),
                        ),
                      ],
                    ),
                  );
                },
              ),
            )
          ]),
        ),
      ],
    );
  }
}
