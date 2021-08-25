<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>Case Report | CCM</title>
        <meta name="description" content="Case Report | CCM" />
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        a:hover {
            text-decoration: underline !important;
        }
        *, body{
            font-family: 'Poppins', sans-serif !important;
        }
    </style>

    <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
        <table
            cellspacing="0"
            border="0"
            cellpadding="0"
            width="100%"
            bgcolor="#f2f3f8"
            style="@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap'); font-family: 'Poppins', sans-serif;"
        >
            <tr>
                <td>
                    <table style="background-color: #f2f3f8; max-width: 670px; margin: 0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="height:80px;">&nbsp;</td>
                        </tr>
                        <!-- Logo -->
                        <tr>
                            <td style="text-align:center;">
                                <a href="#" title="logo" target="_blank">
                                  <img width="250" src="{{ $message->embed(asset('frontend/assets/img/CCM_Logo.svg')) }}" title="logo" alt="logo">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:20px;">&nbsp;</td>
                        </tr>
                        <!-- Email Content -->
                        <tr>
                            <td>
                                <table
                                    width="95%"
                                    border="0"
                                    align="center"
                                    cellpadding="0"
                                    cellspacing="0"
                                    style="
                                        max-width: 670px;
                                        background: #fff;
                                        border-radius: 3px;
                                        -webkit-box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                                        -moz-box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                                        box-shadow: 0 6px 18px 0 rgba(0, 0, 0, 0.06);
                                        padding: 0 40px;
                                    "
                                >
                                    <tr>
                                        <td style="height: 40px;">&nbsp;</td>
                                    </tr>
                                    <!-- Title -->
                                    <tr>
                                        <td style="padding: 0 15px; text-align: center;">
                                            <h1 style="@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap'); font-family: 'Poppins', sans-serif; color: #1e1e2d; font-weight: 500; margin: 0; font-size: 30px;">{{ 'CCM' }}{{ __(' Case Report') }}</h1>
                                            <span style="display: inline-block; vertical-align: middle; margin: 15px 0 20px; border-bottom: 1px solid #cecece; width: 100px;"></span>
                                        </td>
                                    </tr>
                                    <!-- Details Table -->
                                    <tr>
                                        <td>
                                            <table cellpadding="0" cellspacing="0" style="width: 100%; border: 1px solid #ededed; border-color: #ffffff;">
                                                <tbody>

                                                    @if ($data->completion_report != NULL)
                                                        <tr>
                                                            <td colspan="2" style="padding: 10px; font-size: 18px; font-weight: 400; color: #3a506a; text-align: left;">
                                                                Hello {{ optional($data->citizen)->name }}, <br>
                                                                <a href="#" style="color: #131f42; font-weight: 600; text-decoration: none !important;">{{ __('CCM') }}</a> Just Completed Your Case. Please Provide Your <a href="#" style="color: #131f42; font-weight: 700; text-decoration: none !important;">Review</a>.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2" style="padding: 10px; font-size: 18px; font-weight: 400; color: #3a506a; text-align: left; border-left: 3px solid #cfdcff; background: #f8faff;">
                                                                <span style="font-weight: 500;">{{ __('Case Report') }}:
                                                                    <br>
                                                                    {{ $data->completion_report }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @elseif ($data->cancelation_reason != NULL)
                                                        <tr>
                                                            <td colspan="2" style="padding: 10px; font-size: 18px; font-weight: 400; color: #3a506a; text-align: left;">
                                                                Hello {{ optional($data->citizen)->name }}, <br>
                                                                <a href="#" style="color: #131f42; font-weight: 600; text-decoration: none !important;">{{ __('CCM') }}</a> Has Been Canceled Your Case. Cancelation Reason has been described below.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2" style="padding: 10px; font-size: 18px; font-weight: 400; color: #3a506a; text-align: left; border-left: 3px solid #cfdcff; background: #f8faff;">
                                                                <span style="font-weight: 500;">{{ __('Cancelation Reason') }}:
                                                                    <br>
                                                                    {{ $data->cancelation_reason }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    <tr>
                                                        <td colspan="2" style="padding: 10px; font-size: 18px; font-weight: 400; color: #3a506a; text-align: left;">
                                                            <span style="color: #131f42; font-size: 12px; font-weight: 300;">
                                                                [Note: Feel free to contact with <a href="#" style="color: #131f42; font-weight: 500; text-decoration: none !important;">{{ __('CCM') }}</a> for any doubts and query.]
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="height: 30px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">
                                            <a href="{{ route('citizen.case.index') }}" style="background-color: #131f42; color: #ffffff; padding: 10px 25px; font-weight: 600; letter-spacing: 0.05rem; text-decoration: none !important; border-radius: 3px;">{{ __('My All Cases') }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height: 40px;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 20px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                <p style="font-size: 14px; color: #3a506abd; line-height: 18px; margin: 0 0 60px;">&copy; <strong><a href="{{ route('homepage') }}" style="color: #131f42; font-weight: 700; text-decoration: none !important;">{{ __('City Case Management') }}</a></strong></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
