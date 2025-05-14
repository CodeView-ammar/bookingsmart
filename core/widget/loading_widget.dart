import 'package:flutter/material.dart';

class LoadingGeneralWidget extends StatelessWidget {
  const LoadingGeneralWidget({super.key});

  @override
  Widget build(BuildContext context) {
    return const Center(
      // adaptive for andriod and ios
      child: CircularProgressIndicator.adaptive(

      ),
    );
  }
}
