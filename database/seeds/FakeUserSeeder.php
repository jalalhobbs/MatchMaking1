<?php

use Illuminate\Database\Seeder;

class FakeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstNames['male'] = [
            "Liam",
            "Noah",
            "Logan",
            "Lucas",
            "Mason",
            "Oliver",
            "Ethan",
            "Elijah",
            "Aiden",
            "James",
            "Benjamin",
            "Jackson",
            "Sebastian",
            "Jacob",
            "Alexander",
            "Carter",
            "Michael",
            "Jayden",
            "Daniel",
            "William",
            "Luke",
            "Jack",
            "Wyatt",
            "Matthew",
            "Grayson",
            "Henry",
            "Gabriel",
            "Owen",
            "Julian",
            "Levi",
            "Ryan",
            "Lincoln",
            "Leo",
            "Jaxon",
            "Nathan",
            "Samuel",
            "Adam",
            "David",
            "Muhammad",
            "Isaiah",
            "Isaac",
            "Joseph",
            "John",
            "Eli",
            "Dylan",
            "Anthony",
            "Caleb",
            "Hunter",
            "Josiah",
            "Mateo",
            "Joshua",
            "Connor",
            "Andrew",
            "Asher",
            "Christian",
            "Adrian",
            "Landon",
            "Cameron",
            "Aaron",
            "Christopher",
            "Ezra",
            "Easton",
            "Hudson",
            "Jeremiah",
            "Thomas",
            "Max",
            "Nolan",
            "Dominic",
            "Charlie",
            "Brayden",
            "Greyson",
            "Jordan",
            "Colton",
            "Xavier",
            "Jace",
            "Jaxson",
            "Nicholas",
            "Evan",
            "Austin",
            "Bryson",
            "Liam",
            "Noah",
            "Logan",
            "Lucas",
            "Mason",
            "Oliver",
            "Ethan",
            "Elijah",
            "Aiden",
            "James",
            "Benjamin",
            "Jackson",
            "Sebastian",
            "Jacob",
            "Alexander",
            "Carter",
            "Michael",
            "Jayden",
            "Daniel",
            "William",
            "Luke",
            "Jack",
            "Wyatt",
            "Matthew",
            "Grayson",
            "Henry",
            "Gabriel",
            "Owen",
            "Julian",
            "Levi",
            "Ryan",
            "Lincoln",
            "Leo",
            "Jaxon",
            "Nathan",
            "Samuel",
            "Adam",
            "David",
            "Muhammad",
            "Isaiah"
        ];
        $firstNames['female'] = [
            "Emma",
            "Olivia",
            "Ava",
            "Sophia",
            "Isabella",
            "Mia",
            "Amelia",
            "Charlotte",
            "Harper",
            "Ella",
            "Aria",
            "Evelyn",
            "Abigail",
            "Emily",
            "Avery",
            "Scarlett",
            "Sofia",
            "Mila",
            "Madison",
            "Lily",
            "Chloe",
            "Layla",
            "Riley",
            "Ellie",
            "Luna",
            "Zoey",
            "Grace",
            "Victoria",
            "Elizabeth",
            "Penelope",
            "Hannah",
            "Nora",
            "Aubrey",
            "Camila",
            "Addison",
            "Stella",
            "Bella",
            "Natalie",
            "Maya",
            "Savannah",
            "Skylar",
            "Paisley",
            "Lillian",
            "Audrey",
            "Hazel",
            "Aurora",
            "Brooklyn",
            "Zoe",
            "Lucy",
            "Eva",
            "Aaliyah",
            "Anna",
            "Leah",
            "Elena",
            "Violet",
            "Claire",
            "Kinsley",
            "Emilia",
            "Sophie",
            "Eleanor",
            "Alice",
            "Maria",
            "Sarah",
            "Kennedy",
            "Gabriella",
            "Hailey",
            "Naomi",
            "Eliana",
            "Adeline",
            "Peyton",
            "Serenity",
            "Madelyn",
            "Gianna",
            "Sadie",
            "Willow",
            "Aubree",
            "Ariana",
            "Quinn",
            "Julia",
            "Autumn",
            "Caroline",
            "Isabelle",
            "Nova",
            "Everly",
            "Ruby",
            "Nevaeh",
            "Piper",
            "Samantha",
            "Isla",
            "Clara",
            "Rylee",
            "Arya",
            "Kaylee",
            "Alexa",
            "Cora",
            "Arianna",
            "Brielle",
            "Charlie",
            "Valentina",
            "Jade"
        ];
        $lastNames = [
            "Smith",
            "Johnson",
            "Williams",
            "Jones",
            "Brown",
            "Davis",
            "Miller",
            "Wilson",
            "Moore",
            "Taylor",
            "Anderson",
            "Thomas",
            "Jackson",
            "White",
            "Harris",
            "Martin",
            "Thompson",
            "Garcia",
            "Martinez",
            "Robinson",
            "Clark",
            "Rodriguez",
            "Lewis",
            "Lee",
            "Walker",
            "Hall",
            "Allen",
            "Young",
            "Hernandez",
            "King",
            "Wright",
            "Lopez",
            "Hill",
            "Scott",
            "Green",
            "Adams",
            "Baker",
            "Gonzalez",
            "Nelson",
            "Carter",
            "Mitchell",
            "Perez",
            "Roberts",
            "Turner",
            "Phillips",
            "Campbell",
            "Parker",
            "Evans",
            "Edwards",
            "Collins",
            "Stewart",
            "Sanchez",
            "Morris",
            "Rogers",
            "Reed",
            "Cook",
            "Morgan",
            "Bell",
            "Murphy",
            "Bailey",
            "Rivera",
            "Cooper",
            "Richardson",
            "Cox",
            "Howard",
            "Ward",
            "Torres",
            "Peterson",
            "Gray",
            "Ramirez",
            "James",
            "Watson",
            "Brooks",
            "Kelly",
            "Sanders",
            "Price",
            "Bennett",
            "Wood",
            "Barnes",
            "Ross",
            "Henderson",
            "Coleman",
            "Jenkins",
            "Perry",
            "Powell",
            "Long",
            "Patterson",
            "Hughes",
            "Flores",
            "Washington",
            "Butler",
            "Simmons",
            "Foster",
            "Gonzales",
            "Bryant",
            "Alexander",
            "Russell",
            "Griffin",
            "Diaz",
            "Hayes",
        ];

        $password = Hash::make("12345678");
        srand(12345678);
        $maxUsers = 499;
        $users = array();
        $startTime = microtime(true);
        for ($x = 0; $x < $maxUsers; $x++) {
            $targetMinAge = null;
            $targetMaxAge = null;
            $targetMinHeight = null;
            $targetMaxHeight = null;
            $bodyTypeId = null;
            $religionId = null;
            $countryId = null;
            $ethnicityId = null;
            $hairColourId = null;
            $eyeColourId = null;
            $educationId = null;
            $drinkingId = null;
            $smokingId = null;
            $leisureId = null;
            $targetBodyTypeId = null;
            $targetCountryId = null;
            $targetEthnicityId = null;
            $targetHairColourId = null;
            $personalityTypeId = null;
            $targetReligionId = null;

            // gender does not matter for these:
            $lastName = $lastNames[rand(0, count($lastNames) - 1)];

            // dob
            $dobYear = rand(rand(1898, 2000), 2000);
            if ($dobYear == 2000) {
                $dobMonth = rand(1, 3);
            } else {
                $dobMonth = rand(1, 12);
            }

            switch ($dobMonth) {
                case 1:
                    $dobDay = rand(1, 31);
                    break;
                case 2:
                    if ($dobYear % 4 == 0 && $dobYear != 1900) {
                        $dobDay = rand(1, 29);
                    } else {
                        $dobDay = rand(1, 28);
                    }
                    break;
                case 3:
                    $dobDay = rand(1, 31);
                    break;
                case 4:
                    $dobDay = rand(1, 30);
                    break;
                case 5:
                    $dobDay = rand(1, 31);
                    break;
                case 6:
                    $dobDay = rand(1, 30);
                    break;
                case 7:
                    $dobDay = rand(1, 31);
                    break;
                case 8:
                    $dobDay = rand(1, 31);
                    break;
                case 9:
                    $dobDay = rand(1, 30);
                    break;
                case 10:
                    $dobDay = rand(1, 31);
                    break;
                case 11:
                    $dobDay = rand(1, 30);
                    break;
                case 12:
                    $dobDay = rand(1, 31);
                    break;
            }

            $dob = str_pad($dobYear, 2, "0", STR_PAD_LEFT)
                . "-" . str_pad($dobMonth, 2, "0", STR_PAD_LEFT)
                . "-" . str_pad($dobDay, 2, "0", STR_PAD_LEFT);

            // bodyTypeId
            if (rand(0, 5) > 1) {
                $bodyTypeId = rand(1, 4);
            }

            // religionId
            if (rand(0, 5) > 1) {
                $religionId = rand(1, 9);
            }

            // countryId
            if (rand(0, 5) > 1) {
                $countryId = rand(1, 4);
            }
            // ethnicityId
            if (rand(0, 5) > 1) {
                $ethnicityId = rand(1, 11);
            }
            // hairColourId
            if (rand(0, 5) > 1) {
                $hairColourId = rand(1, 5);
            }
            // eyeColourId
            if (rand(0, 5) > 1) {
                $eyeColourId = rand(1, 6);
            }
            // educationId
            if (rand(0, 5) > 1) {
                $educationId = rand(1, 3);
            }
            // drinkingId
            if (rand(0, 5) > 1) {
                $drinkingId = rand(1, 4);
            }
            // smokingId
            if (rand(0, 5) > 1) {
                $smokingId = rand(1, 4);
            }
            // leisureId
            if (rand(0, 5) > 1) {
                $leisureId = rand(1, 5);
            }
            // personalityTypeId
            if (rand(0, 5) > 1) {
                $personalityTypeId = rand(1, 3);
            }


            // gender matters
            $genderId = rand(1, 2);
            if ($genderId == 1) {
                // male attributes
                $firstName = $firstNames['male'][rand(0, count($firstNames['male']) - 1)];
                $height = rand(rand(rand(150, 175), 175), rand(175, 210));

                // targets
                if (rand(0, 5) > 2) {
                    $targetMaxAge = rand(18, rand((max(2018 - $dobYear, 18)), 120));
                    if (rand(0, 5) > 3) {
                        $targetMinAge = rand(18, max($targetMaxAge - rand(0, 7), 18));
                    }
                }

                // target height
                if (rand(0, 5) > 3) {
                    $targetMaxHeight = rand($height - 30, $height + 15);
                    if (rand(0, 5) > 4) {
                        $targetMinHeight = rand($height - 60, $targetMaxHeight);
                    }
                }

            } else {
                // female attributes
                $firstName = $firstNames['female'][rand(0, count($firstNames['female']) - 1)];
                $height = rand(rand(rand(120, 165), 165), rand(165, rand(165, 195)));

                // female targets
                // target age
                if (rand(0, 5) > 3) {
                    $targetMaxAge =
                        rand(18, (min(2018 - $dobYear + 15, 120)));
                    if (rand(0, 5) > 4) {
                        $targetMinAge = rand(18, $targetMaxAge - rand(0, 7));
                    }
                }

                // target height
                if (rand(0, 5) > 3) {
                    $targetMinHeight = rand($height - 45, $height + 30);
                    if (rand(0, 5) > 4) {
                        $targetMaxHeight = rand($targetMinHeight, $height + 60);

                    }
                }
            }


            // email address
            if ($x <= 10) {
                $email = "fake" . $x . "@fake.com";
            } else {
                $email = $firstName . $lastName . $x . "@fake.com";
            }

            // targetReligionId
            if (rand(1, 5) > 4) {
                if (rand(1, 10) < 10) {
                    $targetReligionId = $religionId;
                } else {
                    $targetReligionId = rand(1, 9);
                }
            }

            // targetGenderId
            if (rand(1, 10) == 10) {
                $targetGenderId = $genderId;
            } elseif ($genderId == 1) {
                $targetGenderId = 2;
            } else {
                $targetGenderId = 1;
            }

            if (rand(1, 5) > 3) {
                $targetBodyTypeId = rand(1, 5);
            }
            if (rand(1, 5) > 3) {
                $targetCountryId = rand(1, 5);
            }
            if (rand(1, 5) > 4) {
                $targetEthnicityId = rand(1, 5);
            }
            if (rand(1, 5) > 3) {
                $targetHairColourId = rand(1, 5);
            }

            // db timestamps
            $createdAt = "2017" . "-" . rand(1, 12) . "-" . rand(1, 28);
            $updatedAt = "2018" . "-" . rand(1, 12) . "-" . rand(1, 28);
            array_push($users,
                array(
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'profilePicture' => 'https://i.pinimg.com/564x/44/30/e4/4430e41d9a72c09c6ac2c98fc6bc9c03.jpg',
                    'password' => $password,
                    'dob' => $dob,
                    'genderId' => $genderId,
                    'bodyTypeId' => $bodyTypeId,
                    'religionId' => $religionId,
                    'countryId' => $countryId,
                    'ethnicityId' => $ethnicityId,
                    'hairColourId' => $hairColourId,
                    'eyeColourId' => $eyeColourId,
                    'educationId' => $educationId,
                    'drinkingId' => $drinkingId,
                    'smokingId' => $smokingId,
                    'leisureId' => $leisureId,
                    'personalityTypeId' => $personalityTypeId,
                    'height' => $height,
                    'targetGenderId' => $targetGenderId,
                    'targetMaxAge' => $targetMaxAge,
                    'targetMinAge' => $targetMinAge,
                    'targetMinHeight' => $targetMinHeight,
                    'targetMaxHeight' => $targetMaxHeight,
                    'targetBodyTypeId' => $targetBodyTypeId,
                    'targetReligionId' => $targetReligionId,
                    'targetCountryId' => $targetCountryId,
                    'targetEthnicityId' => $targetEthnicityId,
                    'targetHairColourId' => $targetHairColourId,
                    'created_at' => $createdAt,
                    'updated_at' => $updatedAt,
                    'verified' => rand(0, 1),
                )
            );

            if (count($users) > 12) {
                DB::table('users')->insert($users);
                $users = array();
            }
        }
        if (count($users)) {
            DB::table('users')->insert($users);
        }

        echo (PHP_EOL . microtime(true) - $startTime) * 1000 . "ms" . PHP_EOL;
    }
}