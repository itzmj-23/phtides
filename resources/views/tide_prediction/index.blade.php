@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero bg-base-200 mt-5">
            <div class="hero-content text-center">
                <div class="max-w-xxl">
                    <h1 class="text-5xl font-bold">Tide Prediction Data</h1>
                    <p class="py-6">Tide Predication Data Management begins here</p>
                </div>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl mt-5">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Lists of Data</h2>
                    <div class="card-actions justify-end">
                        <a href="{{ route('tide_prediction.create') }}" class="btn btn-primary">Add Data</a>
                    </div>
                </div>

                <div class="grid overflow-auto">
                    <table class="table table-compact w-full">
                        <thead>
                        <tr>
                            <th>Location ID, Code & Name</th>
                            <th>00</th>
                            <th>01</th>
                            <th>02</th>
                            <th>03</th>
                            <th>04</th>
                            <th>05</th>
                            <th>06</th>
                            <th>07</th>
                            <th>08</th>
                            <th>09</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>DD</th>
                            <th>MM</th>
                            <th>YYYY</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                                <tr>
                                    <td>{{ $data['location_id'] .' - '. $data['location']['code'] .' - ' . $data['location']['name'] }}</td>
                                    <td>{{ $data['00'] }}</td>
                                    <td>{{ $data['01'] }}</td>
                                    <td>{{ $data['02'] }}</td>
                                    <td>{{ $data['03'] }}</td>
                                    <td>{{ $data['04'] }}</td>
                                    <td>{{ $data['05'] }}</td>
                                    <td>{{ $data['06'] }}</td>
                                    <td>{{ $data['07'] }}</td>
                                    <td>{{ $data['08'] }}</td>
                                    <td>{{ $data['09'] }}</td>
                                    <td>{{ $data['10'] }}</td>
                                    <td>{{ $data['11'] }}</td>
                                    <td>{{ $data['12'] }}</td>
                                    <td>{{ $data['13'] }}</td>
                                    <td>{{ $data['14'] }}</td>
                                    <td>{{ $data['15'] }}</td>
                                    <td>{{ $data['16'] }}</td>
                                    <td>{{ $data['17'] }}</td>
                                    <td>{{ $data['18'] }}</td>
                                    <td>{{ $data['19'] }}</td>
                                    <td>{{ $data['20'] }}</td>
                                    <td>{{ $data['21'] }}</td>
                                    <td>{{ $data['22'] }}</td>
                                    <td>{{ $data['23'] }}</td>
                                    <td>{{ $data['DD'] }}</td>
                                    <td>{{ $data['MM'] }}</td>
                                    <td>{{ $data['YYYY'] }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
