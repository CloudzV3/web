class CacheManager {
    static saveData(key, data) {
        try {
            const serializedData = JSON.stringify(data);
            localStorage.setItem(key, serializedData);
            console.log(`Data saved successfully with key: ${key}`);
        } catch (error) {
            console.error('Error saving data to cache:', error);
        }
    }

    static getData(key) {
        try {
            const serializedData = localStorage.getItem(key);
            if (serializedData === null) {
                console.log(`No data found for key: ${key}`);
                return null;
            }
            const data = JSON.parse(serializedData);
            console.log(`Data retrieved successfully for key: ${key}`);
            return data;
        } catch (error) {
            console.error('Error retrieving data from cache:', error);
            return null;
        }
    }

    static removeData(key) {
        try {
            localStorage.removeItem(key);
            console.log(`Data removed successfully for key: ${key}`);
        } catch (error) {
            console.error('Error removing data from cache:', error);
        }
    }
}
