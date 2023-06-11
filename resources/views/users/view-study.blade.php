@extends('users.layout.app')

@section('css')
<link rel="stylesheet" href="assets/css/view-study.css">
@endsection

@section('content')
<div class="container">
    <div class="back">
        <a href="/siswas">
            <button>
                <iconify-icon icon="ion:arrow-back-outline"></iconify-icon>
            </button>
        </a>
        <p>Study Conseling Schedule</p>
    </div>
    <div class="first-row">
        <div class="upcoming">
            <div class="header">
                <p>Upcoming Schedule</p>
            </div>
            <div class="body">
                <div class="content">
                    <div class="left-side">
                        <p>Mrs. Sheila Riani P S.Pst</p>
                        <p>
                            <iconify-icon icon="zondicons:time"></iconify-icon>
                            08.00 - 10.00
                        </p>
                    </div>
                    <div class="right-side">
                        <p>20-2-2024</p>
                        <p>Ruang BK</p>
                    </div>
                </div>
                <div class="content">
                    <div class="left-side">
                        <p>Mrs. Sheila Riani P S.Pst</p>
                        <p>
                            <iconify-icon icon="zondicons:time"></iconify-icon>
                            08.00 - 10.00
                        </p>
                    </div>
                    <div class="right-side">
                        <p>20-2-2024</p>
                        <p>Ruang BK</p>
                    </div>
                </div>
               
            </div>

        </div>
        <div class="history">
            <div class="header">
                <p>History</p>
            </div>
            <div class="body">
                <div class="content">
                    <div class="left-side">
                        <p>Mrs. Sheila Riani P S.Pst</p>
                        <p>
                            <iconify-icon icon="zondicons:time"></iconify-icon>
                            08.00 - 10.00
                        </p>
                    </div>
                    <div class="right-side">
                        <p>20-2-2024</p>
                        <p>Ruang BK</p>
                    </div>
                </div>
                <div class="content">
                    <div class="left-side">
                        <p>Mrs. Sheila Riani P S.Pst</p>
                        <p>
                            <iconify-icon icon="zondicons:time"></iconify-icon>
                            08.00 - 10.00
                        </p>
                    </div>
                    <div class="right-side">
                        <p>20-2-2024</p>
                        <p>Ruang BK</p>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <div class="second-row">
        <div class="schedule">
            <div class="schedule-header">
                <div class="titles">
                    <p>Study Conseling Schedule</p>
                    <p>Here’s your study conseling schedule</p>
                </div>
                <div class="date-picker">
                    <input type="date" id="Test_DatetimeLocal">
                </div>
            </div>
            <div class="schedule-body">
                <table>
                    <tr>
                        <td></td>
                        <td>08.00</td>
                        <td>09.00</td>
                        <td>10.00</td>
                        <td>11.00</td>
                        <td>12.00</td>
                        <td>13.00</td>
                        <td>14.00</td>
                        <td>15.00</td>
                    </tr>
                    <tr class="bbt">
                        <td>Mon</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="bbt">
                        <td>Tue</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="bbt">
                        <td>Wed</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="bbt">
                        <td>Thu</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="bbt">
                        <td>Fri</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="bbt">
                        <td>Sat</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
