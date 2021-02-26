<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('employees')->delete();

        function csv_to_array($filename = "", $delimiter = ",")
        {
            if (!file_exists($filename) || !is_readable($filename)) {
                return false;
            }

            $header = null;
            $data = [];
            if (($handle = fopen($filename, "r")) !== false) {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                    if (!$header) {
                        $header = $row;
                    } else {
                        $data[] = array_combine($header, $row);
                    }
                }
                fclose($handle);
            }
            $result = [];
            $i = 0;
            foreach ($data as $v) {
                $json = str_replace(
                    [
                        "Emp ID",
                        "Name Prefix",
                        "First Name",
                        "Middle Initial",
                        "Last Name",
                        "Gender",
                        "E Mail",
                        "Father's Name",
                        "Mother's Name",
                        "Mother's Maiden Name",
                        "Date of Birth",
                        "Date of Joining",
                        "Salary",
                        "SSN",
                        "Phone No. ",
                        "City",
                        "State",
                        "Zip",
                    ],
                    [
                        "emp_id",
                        "name_prefix",
                        "first_name",
                        "middle_initial",
                        "last_name",
                        "gender",
                        "email",
                        "fathers_name",
                        "mothers_name",
                        "mothers_maiden_name",
                        "dob",
                        "doj",
                        "salary",
                        "ssn",
                        "phone",
                        "city",
                        "state",
                        "zip",
                    ],
                    json_encode($v)
                );
                $result[$i] = json_decode($json, true);
                $result[$i]["dob"] = date(
                    "Y-m-d",
                    strtotime($result[$i]["dob"])
                );
                $result[$i]["doj"] = date(
                    "Y-m-d",
                    strtotime($result[$i]["doj"])
                );
                $i++;
            }
            return $result;
        }

        $csvFile = database_path("employee_data.csv");

        $emp = csv_to_array($csvFile);
        // print_r($emp);

        // Uncomment the below to run the seeder
        DB::table("employees")->insert($emp);
    }
}
