# Generate a react-native app

## Android

1. Install Android studio
```sh
brew install --cask android-studio
```

2. Open Android studio and apply the recommanded setup

3. Create an upload signed key
```sh
keytool -genkeypair -v -keystore upload-key.keystore -alias ftomi-key -keyalg RSA -keysize 2048 -validity 10000
```

4. Fill the form

5. Know the directory of the JDK
```sh
/usr/libexec/java_home
```

6. Go into the returned directory
```sh
cd <directoryPath>
```

7. Move the new key in our project
```sh
mv upload-key.keystore ~/src/personal/ftomi/android/app/
```

8. Edit in our project the `gradle.properties` file and replace each variable by the rights information
```sh
MYAPP_UPLOAD_STORE_FILE=upload-key.keystore
MYAPP_UPLOAD_KEY_ALIAS=ftomi-key
MYAPP_UPLOAD_STORE_PASSWORD=*****
MYAPP_UPLOAD_KEY_PASSWORD=*****
```

9. Edit in our project the `android/app/build.gradle` file and add the signing config
```gradle
android {
    ...
    defaultConfig { ... }
    signingConfigs {
        release {
            if (project.hasProperty('MYAPP_UPLOAD_STORE_FILE')) {
                storeFile file(MYAPP_UPLOAD_STORE_FILE)
                storePassword MYAPP_UPLOAD_STORE_PASSWORD
                keyAlias MYAPP_UPLOAD_KEY_ALIAS
                keyPassword MYAPP_UPLOAD_KEY_PASSWORD
            }
        }
    }
    buildTypes {
        release {
            ...
            signingConfig signingConfigs.release
        }
    }
}
```

10. Go into the android direcvtory of our project
```sh
cd src/personal/ftomi/android/
```

11. Build the apk
```sh
./gradlew assembleRelease
```

## IOS
