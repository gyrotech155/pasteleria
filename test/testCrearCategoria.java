package test;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.ExpectedCondition;
import org.openqa.selenium.support.ui.WebDriverWait;

public class testCrearCategoria  {
    public static void main(String[] args) {
    	System.setProperty("webdriver.gecko.driver", "C:\\seleniumDrivers\\geckodriver.exe");
        WebDriver driver = new FirefoxDriver();

        driver.get("http://localhost:8080/pasteleria/public/sitioAdmin/");

        WebElement email = driver.findElement(By.name("ingEmail"));
        email.sendKeys("lamasgabriel1992@gmail.com");
        
        WebElement pass = driver.findElement(By.name("ingPassword"));
        pass.sendKeys("123456");
        
        WebElement boton = driver.findElement(By.name("ingresar"));
        boton.click();
        
        //Inicio de la prueba
        driver.get("http://localhost:8080/pasteleria/public/sitioAdmin/categorias");
        
        WebElement addCat = driver.findElement(By.name("agregarCategoria"));
        addCat.click();
        
        WebElement nombreCategoria = driver.findElement(By.name("tituloCategoria"));
        nombreCategoria.sendKeys("123456");
        
        //WebElement fotoCategoria = driver.findElement(By.name("foto"));
        //fotoCategoria.sendKeys("vista/img.jpg");
        
        WebElement save = driver.findElement(By.name("guardar"));
        save.click();

        driver.quit();
    }
}