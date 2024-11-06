USE [master]
GO
/****** Object:  Database [pengeluaran_db]    Script Date: 02/11/2024 12:05:20 ******/
CREATE DATABASE [pengeluaran_db]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'pengeluaran_db', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.MSQLRIO\MSSQL\DATA\pengeluaran_db.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'pengeluaran_db_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.MSQLRIO\MSSQL\DATA\pengeluaran_db_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [pengeluaran_db] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [pengeluaran_db].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [pengeluaran_db] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [pengeluaran_db] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [pengeluaran_db] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [pengeluaran_db] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [pengeluaran_db] SET ARITHABORT OFF 
GO
ALTER DATABASE [pengeluaran_db] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [pengeluaran_db] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [pengeluaran_db] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [pengeluaran_db] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [pengeluaran_db] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [pengeluaran_db] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [pengeluaran_db] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [pengeluaran_db] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [pengeluaran_db] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [pengeluaran_db] SET  DISABLE_BROKER 
GO
ALTER DATABASE [pengeluaran_db] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [pengeluaran_db] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [pengeluaran_db] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [pengeluaran_db] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [pengeluaran_db] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [pengeluaran_db] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [pengeluaran_db] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [pengeluaran_db] SET RECOVERY FULL 
GO
ALTER DATABASE [pengeluaran_db] SET  MULTI_USER 
GO
ALTER DATABASE [pengeluaran_db] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [pengeluaran_db] SET DB_CHAINING OFF 
GO
ALTER DATABASE [pengeluaran_db] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [pengeluaran_db] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [pengeluaran_db] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [pengeluaran_db] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
EXEC sys.sp_db_vardecimal_storage_format N'pengeluaran_db', N'ON'
GO
ALTER DATABASE [pengeluaran_db] SET QUERY_STORE = ON
GO
ALTER DATABASE [pengeluaran_db] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [pengeluaran_db]
GO
/****** Object:  Table [dbo].[pengeluaran]    Script Date: 02/11/2024 12:05:21 ******/
USE [pengeluaran_db]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[pengeluaran](
    [id] INT IDENTITY(1,1) NOT NULL,
    [deskripsi] VARCHAR(255) NOT NULL,
    [jumlah] DECIMAL(10, 2) NOT NULL,
    [kategori] VARCHAR(50) NULL,
    [tanggal] DATE NOT NULL,
PRIMARY KEY 
(
    [id] ASC
) WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

SELECT COLUMN_NAME, DATA_TYPE
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_NAME = 'pengeluaran';

select * from pengeluaran;

EXEC sp_rename 'pengeluaran.jumlah', 'harga', 'COLUMN';