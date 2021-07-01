use course_management;

-- Số lượng sinh viên theo Khoa
SELECT count(users.id) as 'so luong sinh vien', majors.name
FROM users
INNER JOIN majors ON users.major_id = majors.id
WHERE users.role_id = 2
GROUP BY majors.name;

-- cau 2
select subjects.name, majors.name from subjects
join majors on majors.id = subjects.major_id
group by majors.name

--cau 3
SELECT users.name, users.id, users.role_id, points.point from users
join points on users.id = points.user_id
where users.role_id = 1