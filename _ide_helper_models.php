<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $password
 * @property string|null $rememberToken
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Answer.
 *
 * @property int $ID
 * @property string $Answer
 * @property int $QuestionID
 * @property int $IsRight
 * @property-read \App\Models\Question $question
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereIsRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereQuestionID($value)
 * @mixin \Eloquent
 */
	class Answer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property-read Category $parentCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $productsCount
 * @property-write mixed $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $subCategories
 * @property-read int|null $subCategoriesCount
 * @method static \Illuminate\Database\Eloquent\Builder|Category children()
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category parents()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Certification.
 *
 * @property int $id
 * @property string|null $name
 * @property int $courseType
 * @property string $completedDate
 * @property string|null $validTo
 * @property string|null $certificationId
 * @property string|null $link
 * @property string $type
 * @property string|null $supplement
 * @property string|null $provider
 * @property int $studentId
 * @property int|null $examId
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property string|null $providerNumber
 * @property string|null $telephoneNumber
 * @property string|null $instructorName
 * @property int|null $display
 * @property-read \App\Models\CourseType $course
 * @property-read \App\Models\Exam|null $exam
 * @property-read \App\Models\Student $user
 * @method static \Database\Factories\CertificationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification onlyDisplayed()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCertificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCompletedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCourseType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereInstructorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereProviderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereSupplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereTelephoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereValidTo($value)
 * @mixin \Eloquent
 */
	class Certification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CourseType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property string|null $stack
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereStack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class CourseType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Exam
 *
 * @property int $id
 * @property string $title
 * @property float $passPercentage
 * @property string $zoomLink
 * @property int $noQuestions
 * @property string $startDate
 * @property string $duration
 * @property string $type
 * @property int $display
 * @property int $end
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Certification[] $certifications
 * @property-read int|null $certificationsCount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questionsCount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Student[] $students
 * @property-read int|null $studentsCount
 * @method static \Database\Factories\ExamFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam onlyDisplayed()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereNoQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam wherePassPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereZoomLink($value)
 * @mixin \Eloquent
 */
	class Exam extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Media
 *
 * @property-write mixed $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $usersCount
 * @method static \Database\Factories\MediaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @mixin \Eloquent
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Section[] $sections
 * @property-read int|null $sectionsCount
 * @property-write mixed $slug
 * @method static \Database\Factories\PermissionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @mixin \Eloquent
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property-read \App\Models\Category $category
 * @property-write mixed $slug
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @mixin \Eloquent
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Question.
 *
 * @property int $ID
 * @property string $Question
 * @property int $TypeID
 * @property int $TestID
 * @property string|null $TextAnswer
 * @property int $Degree
 * @property int $Num
 * @property string $Type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read int|null $answersCount
 * @property-read \App\Models\Exam $exam
 * @method static \Database\Factories\QuestionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTestID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTextAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTypeID($value)
 * @mixin \Eloquent
 * @property-read \App\Models\CourseType $courseType
 */
	class Question extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rule
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SectionPermission[] $sectionsPermissions
 * @property-read int|null $sectionsPermissionsCount
 * @property-write mixed $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $usersCount
 * @method static \Database\Factories\RuleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rule query()
 * @mixin \Eloquent
 */
	class Rule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RuleSectionPermission
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RuleSectionPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RuleSectionPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RuleSectionPermission query()
 * @mixin \Eloquent
 */
	class RuleSectionPermission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Section
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissionsCount
 * @property-write mixed $slug
 * @method static \Database\Factories\SectionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @mixin \Eloquent
 */
	class Section extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SectionPermission
 *
 * @property-read \App\Models\Permission|null $permission
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rule[] $rules
 * @property-read int|null $rulesCount
 * @property-read \App\Models\Section|null $section
 * @method static \Database\Factories\SectionPermissionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionPermission query()
 * @mixin \Eloquent
 */
	class SectionPermission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Student.
 *
 * @property int $ID
 * @property string $UserName
 * @property string $FullName
 * @property string $Password
 * @property string $Email
 * @property string|null $altEmail
 * @property string $Phone
 * @property string $TypeID
 * @property string $ExamType
 * @property string $questionsNum
 * @property string $examTime
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Certification[] $certifications
 * @property-read int|null $certificationsCount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Exam[] $exams
 * @property-read int|null $examsCount
 * @property-read mixed $email
 * @property-read mixed $phone
 * @property-read mixed $type
 * @property-read mixed $userName
 * @method static \Database\Factories\StudentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student onlyAdmins()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAltEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereExamTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereExamType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereQuestionsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereTypeID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUserName($value)
 * @mixin \Eloquent
 */
	class Student extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $ID
 * @property string $UserName
 * @property string|null $email
 * @property string $Password
 * @property string|null $altEmail
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAltEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserName($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

