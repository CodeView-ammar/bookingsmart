import 'package:flutter/material.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:room_check/core/resources/extentions.dart';
import 'package:room_check/core/widget/bottom_widget.dart';
import 'package:room_check/core/widget/text_fieldes.dart';
import 'package:room_check/features/Login/presentation/bloc/login_bloc.dart';
import 'package:room_check/features/Main/presentation/pages/main_page.dart';

class SetPasswordPage extends StatelessWidget {
  const SetPasswordPage({super.key});

  @override
  Widget build(BuildContext context) {
    return BlocProvider(
      create: (context) => LoginBloc()..add(GetCachedDataEvent()),
      child: BlocConsumer<LoginBloc, LoginState>(
        listener: (context, state) {},
        builder: (context, state) {
          var bloc = context.read<LoginBloc>();
          return Scaffold(
            appBar: AppBar(
              backgroundColor: Colors.brown,
              elevation: 0,
            ),
            body: Center(
              child: SingleChildScrollView(
                child: Form(
                  key: bloc.myKey,
                  child: Column(
                    children: [
                      Text(
                        'Welcome, login to your hall',
                        style: Theme.of(context).textTheme.titleMedium,
                      ),
                      10.heightBox,
                      FieldGeneralWidget(
                        controller: bloc.hallurlController,
                        isSecret: false,
                        ispass: false,
                        name: 'URL Hall',
                        val: (value) {
                          if (value.trim().isEmpty) {
                            return 'Field empty';
                          }
                        },
                      ),

                      FieldGeneralWidget(
                        controller: bloc.roomCodeController,
                        isSecret: false,
                        ispass: false,
                        name: 'Hall code',
                        val: (value) {
                          if (value.trim().isEmpty) {
                            return 'Field empty';
                          }
                        },
                        onChanged: (value) {
                          bloc.setPasswordController.text = value; // هنا يتم نسخ القيمة
                        },
                      ),
                      FieldGeneralWidget(
                        controller: bloc.customerCodeController,
                        isSecret: false,
                        ispass: false,
                        name: 'Customer code',
                        val: (value) {
                          if (value.trim().isEmpty) {
                            return 'Field empty';
                          }
                        },
                      ),
                      FieldGeneralWidget(
                        controller: bloc.roomCodeController,
                        isSecret: false,
                        ispass: false,
                        name: 'Enter password',
                        val: (value) {
                          if (value.trim().isEmpty) {
                            return 'Field empty';
                          }
                        },
                      ),
                      BottomWidget(
                        isLoading: false,
                        name: 'Connect',
                        onTap: () {
                          if (bloc.myKey.currentState!.validate()) {
                            FocusScope.of(context).requestFocus(FocusNode());
                            bloc.add(SetPasswordEvent());
                            Navigator.pushAndRemoveUntil(
                              context,
                              MaterialPageRoute(
                                  builder: (_) => const MainPage()),
                              (route) => false,
                            );
                          } else {}
                        },
                      )
                    ],
                  ),
                ),
              ),
            ),
          );
        },
      ),
    );
  }
}