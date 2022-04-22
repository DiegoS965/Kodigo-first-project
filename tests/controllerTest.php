<?php
    use PHPUnit\Framework\TestCase;
    class controllerTest extends TestCase
    {
        /**
         @runInSeparateProcess
        */
        private $data;

        public function setUp():void
        {
            
        }

        public function testSaveTask()
        {
            $newData = array('SaveTitleTask','SaveDescTask','2022-04-05 16:00:00');
            $con = $this->getMockBuilder(con::class)
                ->disableOriginalConstructor()
                ->getMock();
            $expectedQuery = "INSERT INTO tareas(Titulo,Descripcion,Fecha_entrega) VALUES ('$newData[0]', '$newData[1]','$newData[2]')";
            $expectedResultFromQuery= $newData;
            $object = new CrudController(new Connection);
            $result = $object->saveTask($newData);
            $result = $object->getTask(64);
            $result = array($result[0],$result[1],$result[2]);

            $this->assertSame($expectedResultFromQuery,$result);
        } 

        public function testGetTask()
        {
            $con = $this->getMockBuilder(con::class)
                ->disableOriginalConstructor()
                ->getMock();
            $expectedQuery = "SELECT * FROM tareas WHERE IDTarea = 32";
            $returnValue = array('Historia sobre la tecnología','Realizar','2022-04-05 16:00:00','0');
            /* $con->expects($this->once())
                ->method('mysqli_query')
                ->with($this->equalTo($expectedQuery))
                ->willReturn($returnValue); */
            $object = new CrudController(new Connection);
            $result = $object->getTask(32);

            $this->assertSame($returnValue, $result);
        }

        public function testUptadeTask()
        {
            $con = $this->getMockBuilder(con::class)
                ->disableOriginalConstructor()
                ->getMock();
            $updatedTaskData = array('updatedTitleTask','updatedDescTask','2022-04-05 16:00:00','0');
            $taskID = 63;
            $expectedQuery = "UPDATE tareas set Titulo = '$updatedTaskData[0]', Descripcion = '$updatedTaskData[1]', Fecha_entrega = '$updatedTaskData[2]', Calificado = '$updatedTaskData[3]' WHERE IDTarea = $taskID";
            $object = new CrudController(new Connection);
            $result = $object->updateTask($taskID,$updatedTaskData);
            $result = $object->getTask(63);

            $this->assertSame($updatedTaskData,$result);
        } 
        
        public function testSaveStudent()
        {
            $newStudentData = array('SaveStudent5','SaveEmail5','SavePassword5');
            $con = $this->getMockBuilder(con::class)
                ->disableOriginalConstructor()
                ->getMock();
            $expectedQuery = "INSERT INTO alumnos(Nombre,Email,Contrasenya) VALUES ('$newStudentData[0]', '$newStudentData[1]','$newStudentData[2]')";
            $object = new StudentCrudController(new Connection);
            $result = $object->saveStudent($newStudentData);
            $result = $object->getStudent(25);

            $this->assertSame($newStudentData,$result);
        }

        public function testGetStudent()
        {
            $con = $this->getMockBuilder(con::class)
                ->disableOriginalConstructor()
                ->getMock();
            $returnValue = array('Diego Jose','diego@mail.com','abcdf');
            
            $object = new StudentCrudController(new Connection);
            $result = $object->getStudent(2);

            $this->assertSame($returnValue, $result);
        }

        public function testUpdateStudent()
        {
            $con = $this->getMockBuilder(con::class)
                ->disableOriginalConstructor()
                ->getMock();
            $updatedStudentData = array('updatedStudentName','updatedStudentEmail','updatedStudentPassword');
            $studentID = 6;
            $expectedQuery = "UPDATE alumnos set Nombre = '$updatedStudentData[0]', Email = '$updatedStudentData[1]', Contrasenya = '$updatedStudentData[2]' WHERE IDAlumno = $studentID";
            $object = new StudentCrudController(new Connection);
            $result = $object->updateStudent($studentID,$updatedStudentData);
            $result = $object->getStudent(6);

            $this->assertSame($updatedStudentData,$result);
        }   
    }
?>