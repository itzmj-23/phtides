@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero bg-base-200 mt-5">
            <div class="hero-content text-center">
                <div class="max-w-xxl">
                    <h1 class="text-5xl font-bold">API Doc</h1>
                    <p class="py-6">API endpoints are listed here</p>
                </div>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl mt-5">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Lists of API EndPoints</h2>
                </div>

                <div class="grid">
                    <div class="card-body">
                        <h3 class="card-title">Locations <span class="badge">/api/locations</span></h3>
                        <p class="label">returns all locations</p>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Parameters</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>None</th>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Response</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Status Code</th>
                                <td>200</td>
                            </tr>
                            <tr>
                                <th>Content-Type</th>
                                <td>application/json</td>
                            </tr>
                            <tr>
                                <th>Body</th>
                                <td>
                                    <pre>
{
    "result": [
        {
            "id": 1,
            "code": "mnl-01",
            "name": "Manila",
            "description": "this is just a simple and sample description.",
            "created_at": "2022-12-11T03:17:07.000000Z",
            "updated_at": "2022-12-11T03:17:07.000000Z"
        },
        {
            "id": 2,
            "code": "subic-01",
            "name": "Subic",
            "description": "this is just a simple and sample description.",
            "created_at": "2022-12-11T03:17:19.000000Z",
            "updated_at": "2022-12-11T03:17:19.000000Z"
        }
    ],
    "message": "success"
}
                                    </pre>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="grid">
                    <div class="card-body">
                        <h3 class="card-title">Tide Predictions <span class="badge">/api/tide_predictions</span></h3>
                        <p class="label">returns all data of tide predictions with all of the locations</p>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Parameters</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>None</th>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Response</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Status Code</th>
                                <td>200</td>
                            </tr>
                            <tr>
                                <th>Content-Type</th>
                                <td>application/json</td>
                            </tr>
                            <tr>
                                <th>Body</th>
                                <td>
                                    <pre>
{
    "result": [
        {
            "0": "0.26",
            "1": "0.23",
            "2": "0.23",
            "3": "0.29",
            "4": "0.38",
            "5": "0.49",
            "6": "0.59",
            "7": "0.68",
            "8": "0.72",
            "9": "0.73",
            "10": "0.69",
            "11": "0.61",
            "12": "0.5",
            "13": "0.39",
            "id": 1,
            "location_id": 1,
            "00": "0.37",
            "01": "0.38",
            "02": "0.41",
            "03": "0.45",
            "04": "0.48",
            "05": "0.49",
            "06": "0.47",
            "07": "0.43",
            "08": "0.38",
            "09": "0.31",
            "DD": "1",
            "MM": "1",
            "YYYY": "2023",
            "created_at": "2022-12-11T03:17:35.000000Z",
            "updated_at": "2022-12-11T03:17:35.000000Z",
            "location": {
                "id": 1,
                "code": "mnl-01",
                "name": "Manila",
                "description": "this is just a simple and sample description.",
                "created_at": "2022-12-11T03:17:07.000000Z",
                "updated_at": "2022-12-11T03:17:07.000000Z"
            }
        },
        ...
    ],
    "message": "success"
}
                                    </pre>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="grid">
                    <div class="card-body">
                        <h3 class="card-title">Tide Predictions <span class="badge">/api/tide_predictions/{location_id}</span></h3>
                        <p class="label">returns all data of tide predictions of only one location</p>

                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Parameters</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>location_id <span class="badge">integer</span></th>
                                <td>An ID of the specific location</td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Response</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Status Code</th>
                                <td>200</td>
                            </tr>
                            <tr>
                                <th>Content-Type</th>
                                <td>application/json</td>
                            </tr>
                            <tr>
                                <th>Body</th>
                                <td>
                                    <pre>
{
    "result": [
        {
            "0": "0.26",
            "1": "0.23",
            "2": "0.23",
            "3": "0.29",
            "4": "0.38",
            "5": "0.49",
            "6": "0.59",
            "7": "0.68",
            "8": "0.72",
            "9": "0.73",
            "10": "0.69",
            "11": "0.61",
            "12": "0.5",
            "13": "0.39",
            "id": 1,
            "location_id": 1,
            "00": "0.37",
            "01": "0.38",
            "02": "0.41",
            "03": "0.45",
            "04": "0.48",
            "05": "0.49",
            "06": "0.47",
            "07": "0.43",
            "08": "0.38",
            "09": "0.31",
            "DD": "1",
            "MM": "1",
            "YYYY": "2023",
            "created_at": "2022-12-11T03:17:35.000000Z",
            "updated_at": "2022-12-11T03:17:35.000000Z",
            "location": {
                "id": 1,
                "code": "mnl-01",
                "name": "Manila",
                "description": "this is just a simple and sample description.",
                "created_at": "2022-12-11T03:17:07.000000Z",
                "updated_at": "2022-12-11T03:17:07.000000Z"
            }
        },
        ...
    ],
    "message": "success"
}
                                    </pre>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
