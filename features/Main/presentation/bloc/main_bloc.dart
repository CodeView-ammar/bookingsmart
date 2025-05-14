import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:room_check/core/DateTime/date_time_helper.dart';
import 'package:room_check/features/Main/data/Api/room_api.dart';
import 'package:room_check/features/Main/data/models/room_model.dart';
import '../../../../core/errors/failurs.dart';

part 'main_event.dart';
part 'main_state.dart';

class MainBloc extends Bloc<MainEvent, MainState> {
  DateTime todayDate1 = DateTime.now();

  List<DateTime> data = [];

  MainBloc() : super(MainInitial()) {
    on<MainEvent>((event, emit) async {
      if (event is GetRoomsEvent) {
        DateTime startDate =
            DateTimeHelper.getStartAndEndDays(todayDate: todayDate1)[0];
        DateTime endDate =
            DateTimeHelper.getStartAndEndDays(todayDate: todayDate1)[1];

        emit(LoadingRoomsState());
        final respone = await RoomApiProvider.getRooms(
            startTime: startDate, endTime: endDate);

        respone.fold(
            (failure) => {
                  emit(ErrorRoomsState(
                      message: _MessageOfError(failure: failure)))
                },
            (data) => {
              add(FillDatesEvent(dateTime: startDate)),
              emit(SuccessRoomsState(data: data))});
      } else if (event is AddWeekorSubtractWeekEvent) {
        if (event.isAdded) {
          todayDate1 = todayDate1.add(const Duration(days: 7));
          emit(LoadingRoomsState());

          DateTime startDate =
              DateTimeHelper.getStartAndEndDays(todayDate: todayDate1)[0];
          DateTime endDate =
              DateTimeHelper.getStartAndEndDays(todayDate: todayDate1)[1];
          final respone = await RoomApiProvider.getRooms(
              startTime: startDate, endTime: endDate);

          respone.fold(
              (failure) => {
                    emit(ErrorRoomsState(
                        message: _MessageOfError(failure: failure)))
                  },
              (data) => {
                add(FillDatesEvent(dateTime: startDate)),
                emit(SuccessRoomsState(data: data))});
        } else {
          todayDate1 = todayDate1.subtract(const Duration(days: 7));
          emit(LoadingRoomsState());
          DateTime startDate =
              DateTimeHelper.getStartAndEndDays(todayDate: todayDate1)[0];
          DateTime endDate =
              DateTimeHelper.getStartAndEndDays(todayDate: todayDate1)[1];
          final respone = await RoomApiProvider.getRooms(
              startTime: startDate, endTime: endDate);

          respone.fold(
              (failure) => {
                    emit(ErrorRoomsState(
                        message: _MessageOfError(failure: failure)))
                  },
              (data) => {
                add(FillDatesEvent(dateTime: startDate)),
                emit(SuccessRoomsState(data: data))});
        }
      } else if (event is FillDatesEvent) {
        data.clear();
        data = List.generate(8, (index) {
          return DateTime(event.dateTime.year, event.dateTime.month,
              event.dateTime.day + index);
        });
      }
    });
  }

  // ignore: non_constant_identifier_names
  String _MessageOfError({required Failure failure}) {
    switch (failure.runtimeType) {
      case OfflineFailure:
        return 'حدث خطا في الشبكه';
      case ServerFailure:
        return 'حدث خطا ما حاول مره اخري';
      default:
        return 'حدث خطا ما حاول مره اخري';
    }
  }
}
