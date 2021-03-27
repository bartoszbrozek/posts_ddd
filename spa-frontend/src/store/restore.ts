const typesThatShouldBeRestored: any[] = []
const classNameProperty = '__className'

// Use this to decorate a class that needs to be restored
export default function Restore() {
  return function _Restore<T extends { new(...args: any[]): {} }>(constructor: T) {
    typesThatShouldBeRestored.push(constructor)

    return class extends constructor {
      constructor(...args: any[]) {
        super(...args)
        // @ts-ignore
        this[classNameProperty] = constructor.name
      }
    }
  }
}

function canBeRestored(object: any): boolean {
  return object?.hasOwnProperty(classNameProperty)
}

export function isEmpty(obj: any) {
  for (const prop in obj) {
    if (obj?.hasOwnProperty(prop)) {
      return false;
    }
  }

  return JSON.stringify(obj) === JSON.stringify({});
}

// Use this method to restore the typing on an object
export function restoreTyping(object: any) {
  if (Array.isArray(object)) {
    object.forEach(item => restoreTyping(item))
  }

  for (const property in object) {
    if (!object?.hasOwnProperty(property)) {
      continue
    }

    const targetObject = object[property]
    if (typeof targetObject === 'object') {
      if (canBeRestored(targetObject)) {
        const type = typesThatShouldBeRestored.find(
          instanceType => instanceType.name === targetObject[classNameProperty]
        )
        object[property] = Object.assign(Object.create(type!.prototype), targetObject)
      } else {
        restoreTyping(targetObject)
      }
    }
  }
}