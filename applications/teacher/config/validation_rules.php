<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['admission'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'You must enter a name'
		]
	],
	[
		'field' => 'fname',
		'rules' => 'required',
		'errors' => [
			'required' => 'You must enter above field'
		]
	],
	[
		'field' => 'mname',
		'rules' => 'required',
		'errors' => [
			'required' => 'You must enter above field'
		]
	],
	[
		'field' => 'contact',
		'rules' => 'required|exact_length[10]|numeric',
		'errors' => [
			'required' => 'You must enter a phone number',
			'exact_length' => 'Must be a 10 digit number',
			'numeric' => 'Invalid Phone Number'
		]
	],
	[
		'field' => 'admno',
		'rules' => 'required',
		'errors' => [
			'required' => 'You must enter admission number',
		]
	],
	[
		'field' => 'smsno',
		'rules' => 'required|exact_length[10]|numeric',
		'errors' => [
			'required' => 'You must enter a phone number',
			'exact_length' => 'Must be a 10 digit number',
			'numeric' => 'Invalid Phone Number'
		]
	],
	[
		'field' => 'rollno',
		'rules' => 'required|numeric',
		'errors' => [
			'required' => 'You must enter Roll no.',
			'numeric' => 'Invalid Roll no.'
		]
	],
// 	[
// 		'field' => 'aadharno',
// 		'rules' => 'required|exact_length[12]|numeric',
// 		'errors' => [
// 			'required' => 'You must enter Aadhaar number',
// 			'exact_length' => 'Must be a 12 digit number',
// 			'numeric' => 'Invalid Aadhaar number'
// 		]
// 	],
	[
		'field' => 'dob',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid Date'
		]
	],
// 	[
// 		'field' => 'address',
// 		'rules' => 'required|min_length[10]',
// 		'errors' => [
// 			'required' => 'You must enter address',
// 			'min_length' => 'Enter a Valid Address'
// 		]
// 	],
	[
		'field' => 'email',
		'rules' => 'valid_email',
		'errors' => [
			'valid_email' => 'Enter a valid email'
		]
	]
];

$config['teacher'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'You must enter a name'
		]
	],
	[
		'field' => 'email',
		'rules' => 'valid_email',
		'errors' => [
			'valid_email' => 'Enter a valid email'
		]
	],
	[
		'field' => 'post',
		'rules' => 'required',
		'errors' => [
			'required' => 'You must the above field'
		]
	],
	[
		'field' => 'contact',
		'rules' => 'required|exact_length[10]|numeric',
		'errors' => [
			'required' => 'You must enter a phone number',
			'exact_length' => 'Must be a 10 digit number',
			'numeric' => 'Invalid Phone Number'
		]
	],
	[
		'field' => 'dob',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid Date'
		]
	],
	[
		'field' => 'doj',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid Date'
		]
	],
];

$config['timetable'] = [
	[
		'field' => 'subjectname',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid Subject'
		]
	],
	[
		'field' => 'stime',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid time'
		]
	],
	[
		'field' => 'etime',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid time'
		]
	]
];

$config['exam'] = [
	[
		'field' => 'topic',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid topic'
		]
	],
	[
		'field' => 'date',
		'rules' => 'required',
		'errors' => [
			'required' => 'Date is required'
		]
	],
	[
		'field' => 'marks',
		'rules' => 'required',
		'errors' => [
			'required' => 'Max Marks are required'
		]
	]
];

$config['uploadMarks'] = [
    [
        'field' => 'marks[]',
		'rules' => 'required',
		'errors' => [
			'required' => 'Marks are required'
		]
	],

];

$config['homework'] = [
	[
		'field' => 'assignment',
		'rules' => 'required',
		'errors' => [
			'required' => 'Homework is required'
		]
	]
];

$config['class'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'Class Name is required'
		]
	],
];

$config['employee'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'Field Name is required'
		]
	],
	[
		'field' => 'post',
		'rules' => 'required',
		'errors' => [
			'required' => 'Field Post is required'
		]
	]
];

$config['fee'] = [
	[
		'field' => 'admission_fee',
		'rules' => 'required',
		'errors' => [
			'required' => 'Admission Fee is required'
		]
	],
	[
		'field' => 'tuition_fee',
		'rules' => 'required',
		'errors' => [
			'required' => 'Tuition Fee is required'
		]
	],
	[
		'field' => 'annual_fee',
		'rules' => 'required',
		'errors' => [
			'required' => 'Annual Fee is required'
		]
	],
	[
		'field' => 'sibling_discount',
		'rules' => 'required',
		'errors' => [
			'required' => 'Sibling Discount is required'
		]
	],
];

$config['route'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'Route Name is required'
		]
	],
	[
		'field' => 'total',
		'rules' => 'required',
		'errors' => [
			'required' => 'Field is required'
		]
	]
];

$config['station'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'Station Name is required'
		]
	],
	[
		'field' => 'total',
		'rules' => 'required',
		'errors' => [
			'required' => 'Field is required'
		]
	],
	[
		'field' => 'stime',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid time'
		]
	],
	[
		'field' => 'etime',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid time'
		]
	]
];

$config['subroute'] = [
	[
		'field' => 'stime',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid time'
		]
	],
	[
		'field' => 'etime',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid time'
		]
	]
];

$config['bus'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'Station Name is required'
		]
	],
	[
		'field' => 'model',
		'rules' => 'required',
		'errors' => [
			'required' => 'Field is required'
		]
	],
	[
		'field' => 'regno',
		'rules' => 'required',
		'errors' => [
			'required' => 'Field is required'
		]
	],
	[
		'field' => 'seats',
		'rules' => 'required',
		'errors' => [
			'required' => 'Field is required'
		]
	],
	[
		'field' => 'capacity',
		'rules' => 'required',
		'errors' => [
			'required' => 'Field is required'
		]
	]
];

$config['transportstaff'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'You must enter a name'
		]
	],
	[
		'field' => 'email',
		'rules' => 'valid_email',
		'errors' => [
			'valid_email' => 'Enter a valid email'
		]
	],
	[
		'field' => 'post',
		'rules' => 'required',
		'errors' => [
			'required' => 'You must the above field'
		]
	],
	[
		'field' => 'contact',
		'rules' => 'required|exact_length[10]|numeric',
		'errors' => [
			'required' => 'You must enter a phone number',
			'exact_length' => 'Must be a 10 digit number',
			'numeric' => 'Invalid Phone Number'
		]
	],
	[
		'field' => 'address',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter Address'
		]
	],
];

$config['fee_accept'] = [
	[
		'field' => 'amount_paid',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter amount'
		]
	],
	[
		'field' => 'payment_date',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid date'
		]
	],
];

$config['movement'] = [
	[
		'field' => 'qrcode',
		'rules' => 'exact_length[16]',
		'errors' => [
			'exact_length' => 'Invalid QR code'
		]
	]
];

$config['event'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'Event name is required'
		]
	],
	[
		'field' => 'description',
		'rules' => 'required',
		'errors' => [
			'required' => 'Event Description is required'
		]
	],
	[
		'field' => 'date',
		'rules' => 'required',
		'errors' => [
			'required' => 'Event Date is required'
		]
	]
];

$config['quiz'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'Quiz Topic is required'
		]
	],
	[
		'field' => 'date',
		'rules' => 'required',
		'errors' => [
			'required' => 'Expiry Date is required'
		]
	]
];

$config['quizQuestion'] = [
	[
		'field' => 'question',
		'rules' => 'required',
		'errors' => [
			'required' => 'Enter a valid Question'
		]
	],
	[
		'field' => 'options',
		'rules' => 'required',
		'errors' => [
			'required' => 'Options are required'
		]
	],
	[
		'field' => 'correct',
		'rules' => 'required',
		'errors' => [
			'required' => 'Correct option number is required'
		]
	]
];

$config['message'] = [
	[
		'field' => 'message',
		'rules' => 'required',
		'errors' => [
			'required' => 'At least Enter a message'
		]
	],
	[
		'field' => 'id[]',
		'rules' => 'required',
		'errors' => [
			'required' => 'At least select a recipient'
		]
	]
];

$config['payment'] = [
	[
		'field' => 'period',
		'rules' => 'required',
		'errors' => [
			'required' => 'Payment Period is required'
		]
	],
	[
		'field' => 'lastdate',
		'rules' => 'required',
		'errors' => [
			'required' => 'Last Date is required'
		]
	],
	[
		'field' => 'id[]',
		'rules' => 'required',
		'errors' => [
			'required' => 'At least select a student'
		]
	]
];

$config['promote'] = [
	[
		'field' => 'ids[]',
		'rules' => 'required',
		'errors' => [
			'required' => 'At least select a student'
		]
	]
];


$config['post'] = [
	[
		'field' => 'text',
		'rules' => 'required',
		'errors' => [
			'required' => 'Text is required'
		]
	]
];


$config['questionPaper'] = [
	[
		'field' => 'questions[]',
		'rules' => 'required',
		'errors' => [
			'required' => 'At least select a question'
		]
	],
	[
		'field' => 'exam',
		'rules' => 'required',
		'errors' => [
			'required' => 'Exam name is required'
		]
	],
	[
		'field' => 'max',
		'rules' => 'required|numeric',
		'errors' => [
			'required' => 'Maximum marks are required',
			'numeric' => 'Enter a valid number'
		]
	],
	[
		'field' => 'subject',
		'rules' => 'required',
		'errors' => [
			'required' => 'Subject is required',
		]
	],
	[
		'field' => 'duration',
		'rules' => 'required',
		'errors' => [
			'required' => 'Duration is required'
		]
	],
];

$config['question'] = [
	[
		'field' => 'content',
		'rules' => 'required',
		'errors' => [
			'required' => 'Content is required'
		]
	],
	[
		'field' => 'weightage',
		'rules' => 'required|numeric',
		'errors' => [
			'required' => 'Weightage is required',
			'numeric' => 'Enter a valid number'
		]
	],
	[
		'field' => 'subject',
		'rules' => 'required',
		'errors' => [
			'required' => 'Subject is required',
		]
	],
];

$config['assignment'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'Name is required'
		]
	],
	[
		'field' => 'subject',
		'rules' => 'required',
		'errors' => [
			'required' => 'Subject is required',
		]
	],
	[
		'field' => 'questions[]',
		'rules' => 'required',
		'errors' => [
			'required' => 'At least select a question'
		]
	],
];

$config['metrics'] = [
	[
		'field' => 'name',
		'rules' => 'required',
		'errors' => [
			'required' => 'You must enter Metric name'
		]
	],
	[
		'field' => 'ability',
		'rules' => 'required',
		'errors' => [
			'required' => 'Ability is required'
		]
	],
];

$config['auth'] = [
	[
		'field' => 'username',
		'rules' => 'required',
		'errors' => [
			'required' => 'You must enter a valid Username'
		]
	],
	[
		'field' => 'password',
		'rules' => 'required',
		'errors' => [
			'required' => 'Password is required'
		]
	],
];

$config['sport'] = [
    [
        'field' => 'name',
        'rules' => 'required',
        'errors' => [
            'required' => 'Event name is required'
        ]
    ],
    [
        'field' => 'date',
        'rules' => 'required',
        'errors' => [
            'required' => 'Event Date is required'
        ]
    ]
];

$config['visitor'] = [
    [
        'field' => 'name',
        'rules' => 'required',
        'errors' => [
            'required' => 'Visitor name is required'
        ]
    ],
    [
        'field' => 'address',
        'rules' => 'required',
        'errors' => [
            'required' => 'Visitor Address is required'
        ]
    ],
    [
        'field' => 'purpose',
        'rules' => 'required',
        'errors' => [
            'required' => 'Purpose is required'
        ]
    ],
    [
        'field' => 'phone',
        'rules' => 'required',
        'errors' => [
            'required' => 'Phone is required'
        ]
    ],
];

$config['formerTeacher'] = [
    [
        'field' => 'date_of_leaving',
        'rules' => 'required',
        'errors' => [
            'required' => 'Date of Leaving is required'
        ]
    ],
];
