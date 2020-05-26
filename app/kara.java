// Note: Under Windows, do not save Java files to top-level directory (e.g. C:).
// If compiling with JDK 1.4, you must remove the following line:
import javakara.JavaKaraProgram;
/*
 * COMMANDS:
 *   kara.move()           kara.turnRight()      kara.turnLeft()
 *   kara.putLeaf()        kara.removeLeaf()
 * SENSORS:
 *   kara.treeFront()      kara.treeLeft()       kara.treeRight()
 *   kara.mushroomFront()  kara.onLeaf()
 */
public class BubbleSort extends JavaKaraProgram {
  //
  // you can define your methods here:
  //
  public void myProgram() {
    // put your main program here, for example:

   for(int y = 0; y<7; y++) {
       for(int x = 0; x<7; x++) {
         //murund bui leaf tooolno
         while(kara.onLeaf()) {
          if(!kara.treeFront()) {kara.move();} else {break;}
        }
        goBack();
        //Daraagiin murluu shiljine
        shiftLine();
        //
        if(!kara.onLeaf()) {
          kara.turnRight();
          while(!kara.onLeaf()) {
            kara.putLeaf();
            if(!kara.treeFront()) {kara.move();} else {break;}
          }
          shiftLine();
          kara.turnRight();
          while(kara.onLeaf()) {
            kara.removeLeaf();
            if(!kara.treeFront()) {kara.move();} else {break;}
          }
          shiftLine();
        }

          kara.turnRight();
          while(!kara.treeFront()) {
            kara.move();
          }
          kara.turnRight();
          kara.turnRight();

      }
      //BUTSAJ DEESHLEKH UILDEL

   }
  }
  private void shiftLine() {
    kara.turnRight();
    kara.move();
  }
  private void goBack() {
    kara.turnRight();
    kara.turnRight();
    kara.move();
    kara.turnRight();
    kara.turnRight();
  }
  }
