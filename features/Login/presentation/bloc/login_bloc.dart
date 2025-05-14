import 'package:flutter/material.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:room_check/core/SharedPref/shared_helper.dart';

part 'login_event.dart';
part 'login_state.dart';

class LoginBloc extends Bloc<LoginEvent, LoginState> {
  TextEditingController setPasswordController = TextEditingController();
  TextEditingController logInController = TextEditingController();
  TextEditingController customerCodeController = TextEditingController();
  TextEditingController hallurlController = TextEditingController();
  TextEditingController roomCodeController = TextEditingController();
  GlobalKey<FormState> myKey = GlobalKey<FormState>();
  LoginBloc() : super(LoginInitial()) {
    on<LoginEvent>((event, emit) async {
      if (event is SetPasswordEvent) {
        SharedHelper.setstring(
            key: 'PASSWORD', value: roomCodeController.text);
        SharedHelper.setstring(
            key: 'CUSTOMER', value: customerCodeController.text);
        SharedHelper.setstring(key: 'ROOM', value: roomCodeController.text);
        SharedHelper.setstring( key: 'HALLURL', value: hallurlController.text);
        emit(SetPasswodState());
      } else if (event is LoginNowEvent) {
        if (SharedHelper.getstring(key: 'PASSWORD') == logInController.text) {
          SharedHelper.setstring(
              key: 'CUSTOMER', value: customerCodeController.text);
          SharedHelper.setstring(key: 'ROOM', value: roomCodeController.text);
          emit(SuccessPasswordState());
        } else {
          emit(WrongPasswordState());
        }
      } else if (event is GetCachedDataEvent) {
        if (SharedHelper.getstring(key: 'CUSTOMER') != null &&
            SharedHelper.getstring(key: 'ROOM') != null) {
          customerCodeController.text = SharedHelper.getstring(key: 'CUSTOMER');
          roomCodeController.text = SharedHelper.getstring(key: 'ROOM');
          emit(GetCachedDataState());
        } else {
          emit(GetCachedDataState());
        }
      }
    });
  }
}
