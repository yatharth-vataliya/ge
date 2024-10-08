<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GE REGISTRATION</title>
</head>

<body>
    @if (!empty($students[0]->id))
        <table>
            <thead>
                <tr>
                    <th colspan="8">ATMIYA UNIVERSITY, Rajkot</th>
                </tr>
                <tr align="center">
                    <th colspan="8"></th>
                </tr>
                <tr align="center">
                    <th colspan="8">Generic Elective Course Selection</th>
                </tr>
                <tr align="center">
                    <th colspan="8">Department :- {{ $department_name }}</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Semester - {{ $students[0]->sem }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Batch - {{ date('Y') }}</th>
                </tr>
                <tr>
                    <th>Sr. No.</th>
                    <th>Enrolment No.</th>
                    <th>Name of Student</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Male/Female</th>
                    <th>Phone No</th>
                    <th>Selected Course</th>
                </tr>
            </thead>
            <tbody>
                @php  $no = 0; @endphp
                @foreach ($students as $student)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $student->enrollment_no }}</td>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->department?->department_name }} @if ($student->department)
                                ({{ $student->department?->type }})
                            @endif
                        </td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->contact }}</td>
                        <td>{{ $student->course?->course_name }} @if ($student->course)
                                ({{ $student->course?->department->type }})
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <table>
            <thead>
                <tr>
                    <th>No Records Found</th>
                </tr>
            </thead>
        </table>
    @endif
</body>

</html>
