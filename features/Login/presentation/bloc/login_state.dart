part of 'login_bloc.dart';

abstract class LoginState{

}
class LoginInitial extends LoginState {}

class SetPasswodState extends LoginState{}

class WrongPasswordState extends LoginState{
  final String message = 'wrong password';
}

class SuccessPasswordState extends LoginState{}

class GetCachedDataState extends LoginState{}
